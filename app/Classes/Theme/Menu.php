<?php

namespace App\Classes\Theme;

use App\Models\MenuManager;
use App\Models\Theme;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class Menu
{

  public static function sidebar()
  {
    $menuManager = new MenuManager;
    $roleId = isset(Auth::user()->roles[0]) ? Auth::user()->roles[0]->id : NULL;
    $menu_list = $menuManager->getall($roleId);
    $roots = $menu_list->where('parent_id', 0) ?? array();
    return self::tree($roots, $menu_list, $roleId);
  }

  public static function theme()
  {
    $theme = Theme::select('direction', 'sidebar_layout', 'sidemenu', 'theme_layout', 'sidebar_color')->where('user_id', Auth::id())->first() ?? NULL;
    $value = array_values((isset($theme) ? $theme->toArray() : array()));
    return implode(" ", $value);
  }

  public static function tree($roots, $menu_list, $roleId, $parentId = 0)
  {
    $html = "";
    foreach ($roots as $item) {
      $find = $menu_list->where('parent_id', $item['id']);
      if ($parentId == 0) {
        if ($find->count() > 0) {
          $html .=
            "<li class='nav-item'>
              <a class='nav-link with-sub' href='".(!$item->menu_permission_id ? ($item->path_url ? $item->path_url : '#') : $item->menupermission->path_url)."'>
                <span class='shape1'></span>
                <span class='shape2'></span>
                <i class='" . (!$item->menu_permission_id ? $item->icon : $item->menupermission->icon) . " sidemenu-icon'></i>
                <span class='pe-4 " . ($parentId == 0 ? 'sidemenu-label' : NULL) . "'>" . (!$item->menu_permission_id ? $item->title : $item->menupermission->title) . "</span>
                <i class='angle fe fe-chevron-right'></i>
              </a>
            ";
          $html .= self::children($find, $menu_list, $roleId, $item['id']);
          $html .= '</li>';
        } else {
        $html .= '
            <li class="nav-item">
							<a class="nav-link" href="'.(!$item->menu_permission_id ? ($item->path_url ? $item->path_url : '#') : $item->menupermission->path_url).'">
                <span class="shape1"></span>
                <span class="shape2"></span>
                  <i class="' . (!$item->menu_permission_id ? $item->icon : $item->menupermission->icon) . ' sidemenu-icon"></i>
                <span class="pe-4 ' . ($parentId == 0 ? 'sidemenu-label' : NULL) . '">' . (!$item->menu_permission_id ? $item->title : $item->menupermission->title) . '</span>
							</a>
						</li>
						';
        }
      }
    }

    return $html;
  }

  public static function children($roots, $menu_list, $roleId, $parentId = 0){
    $html = '<ul class="nav-sub">';
    foreach ($roots as $item) {
      $find = $menu_list->where('parent_id', $item['id']);
      if ($find->count() > 0) {
        $htmlChildren = self::children($find, $menu_list, $roleId, $item['id']);
        $html .= '
        <li class="nav-sub-item">
            <a class="nav-sub-link with-sub" href="'.(!$item->menu_permission_id ? ($item->path_url ? $item->path_url : '#') : $item->menupermission->path_url).'">
              <span class="pe-4 ' . ($parentId == 0 ? 'sidemenu-label' : NULL) . '">' . (!$item->menu_permission_id ? $item->title : $item->menupermission->title) . '</span>
              <i class="angle fe fe-chevron-right" style="color: rgba(255, 255, 255, 0.4)"></i>
            </a>
            '.$htmlChildren.'
        </li>';
      }else{
        $html .= '
         <li class="nav-sub-item">
             <a href="' . ($find->count() > 0 ? "javascript: void(0);" : (!$item->menu_permission_id ? ($item->path_url ? $item->path_url : '#') : $item->menupermission->path_url)) . '" class="pe-4 nav-sub-link">
                ' . (!$item->menu_permission_id ? $item->title : $item->menupermission->title) . '
             </a>
          </li>';
      }
    }
    $html .= '</ul>';
    return $html;
  }

}