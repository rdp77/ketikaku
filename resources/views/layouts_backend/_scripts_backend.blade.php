<script src="{{ asset('assets_backend/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets_backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
{{--  --}}
<script src="{{ asset('assets_backend/extra-libs/DataTables/datatables.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.js') }}"></script>
<script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets_backend/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets_backend/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<script src="{{ asset('assets_backend/libs/tinymce/tinymce.min.js') }}"></script>
<!--chartis chart-->
<script src="{{ asset('assets_backend/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
<!--c3 charts -->
<script src="{{ asset('assets_backend/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('assets_backend/extra-libs/c3/c3.min.js') }}"></script>
<!--chartjs -->
<script src="{{ asset('assets_backend/libs/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/morris.js/morris.min.js') }}"></script>

<script src="{{ asset('dist/js/pages/dashboards/dashboard1.js') }}"></script>
<script src="{{ asset('assets_backend/libs/dragula/dist/dragula.min.js') }}"></script>
<script src="{{ asset('assets_backend/libs/iziToast-master/dist/js/iziToast.min.js') }}"></script>


<script type="text/javascript">
    $(".preloader").fadeOut();

    var baseUrl = '{{ url('/') }}';
    $(function() {
            dragula([document.getElementById("draggable-area")]),
                dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                    e.className = e.className.replace("card-moved", "")
                }).on("drop", function(e) {
                    e.className += " card-moved"
                }).on("over", function(e, t) {
                    t.className += " card-over"
                }).on("out", function(e, t) {
                    t.className = t.className.replace("card-over", "")
                }), dragula([document.getElementById("copy-left"), document.getElementById("copy-right")], {
                    copy: !0
                }), dragula([document.getElementById("left-handles"), document.getElementById("right-handles")], {
                    moves: function(e, t, n) {
                        return n.classList.contains("handle")
                    }
                }), dragula([document.getElementById("left-titleHandles"), document.getElementById("right-titleHandles")], {
                    moves: function(e, t, n) {
                        return n.classList.contains("titleArea")
                    }
                })
        });
</script>