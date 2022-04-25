<!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2021 <a href="https://inovatiz.com/" class="font-weight-bold ml-1" target="_blank">Developed By Inovatiz</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  
  <script src="{{asset ('/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('/assets/js/js.cookie.js')}}"></script>
  <script src="{{asset ('/assets/js/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset ('/assets/js/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset ('/assets/js/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset ('/assets/js/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{asset ('/assets/js/argon.min.js')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset ('/assets/js/demo.min.js')}}"></script>

  @if(Request::segment(1)=='dashboard' || Request::segment(1)=='dashboard_hub')
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
      <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    
      <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
            $( function() {
                $( "#datepicker1" ).datepicker();
            } );
       </script>
  @endif
  
  
</body>

</html>