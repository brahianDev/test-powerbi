    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
    </a>
    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo(APP_URL.'login/destroySession') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
        </div>
        </div>
    </footer>

    <script src="<?php echo(APP_URL) ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo(APP_URL) ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo(APP_URL) ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="<?php echo(APP_URL) ?>assets/js/sb-admin-2.min.js"></script>

    <script src="<?php echo(APP_URL) ?>vendor/chart.js/Chart.min.js"></script>

    <script src="<?php echo(APP_URL) ?>assets/js/chart-area-demo.js"></script>
    <script src="<?php echo(APP_URL) ?>assets/js/chart-pie-demo.js"></script>
</body>
</html>