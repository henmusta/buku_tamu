<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\MenuManager
 *
 * @property int $id
 * @property int $parent_id
 * @property int|null $menu_permission_id
 * @property int $role_id
 * @property string|null $title
 * @property string|null $path_url
 * @property string|null $icon
 * @property string|null $type
 * @property int $sort
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereMenuPermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager wherePathUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuManager whereType($value)
 * @mixin \Eloquent
 */
	class IdeHelperMenuManager extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MenuPermission
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $path_url
 * @property string $icon
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission wherePathUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MenuPermission whereTitle($value)
 * @mixin \Eloquent
 */
	class IdeHelperMenuPermissions extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PermissionRole
 *
 * @property int $id
 * @property int $permission_id
 * @property int $role_id
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionRole whereRoleId($value)
 * @mixin \Eloquent
 */
	class IdeHelperPermissionRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property int $menu_permission_id
 * @property string $name
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereMenuPermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSlug($value)
 * @mixin \Eloquent
 */
	class IdeHelperPermissions extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereSlug($value)
 * @mixin \Eloquent
 */
	class IdeHelperRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RoleUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleUser query()
 * @mixin \Eloquent
 */
	class IdeHelperRoleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property string $email
 * @property string $username
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser extends \Eloquent {}
}

