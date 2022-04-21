<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.bundle.min.js" integrity="sha512-trzlduO3EdG7Q0xK4+A+rPbcolVt37ftugUSOvrHhLR5Yw5rsfWXcpB3CPuEBcRBCHpc+j18xtQ6YrtVPKCdsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Perfect-scrollbar js -->
<script src="{{ asset('assets/js/components/perfect-scrollbar.min.js') }}"></script>

<!-- Sidemenu js -->
<script src="{{ asset('assets/js/components/sidemenu.js') }}"  id="leftmenu"></script>


<!-- Sticky js -->
<script src="{{ asset('assets/js/components/sticky.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('assets/js/components/custom.js') }}"></script>

<script src="{{ asset('assets/js/components/switcher.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script>
  $(document).ready(function () {
    const ps = new PerfectScrollbar('.ps', {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
    $('.select2').select2({
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search',
      minimumResultsForSearch: Infinity,
      width: '100%'
    });
  });
</script>
@yield('script')
