   <!--end page wrapper -->
   <!--start overlay-->
   <div class="overlay toggle-icon"></div>
   <!--end overlay-->
   <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
   <!--End Back To Top Button-->
   <footer class="page-footer">
       <p class="mb-0">Copyright © 2023. All right reserved.</p>
   </footer>
   </div>
   <!--end wrapper-->
   <!--start switcher-->

   <!--end switcher-->
   <!-- Bootstrap JS -->
   <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
   <!--plugins-->

   <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
   <script src="<?= base_url() ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
   <script src="<?= base_url() ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
   <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
   <script src="<?= base_url() ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url() ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
   <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>
   <script src="<?= base_url() ?>assets/js/scripta.js"></script>
   <script>
       $(document).ready(function() {
           $('#example').DataTable();
       });
   </script>
   <script>
       $(document).ready(function() {
           var table = $('#example2').DataTable({
               lengthChange: false,
               buttons: ['']
           });

           table.buttons().container()
               .appendTo('#example2_wrapper .col-md-6:eq(0)');
       });
   </script>
   <!--app JS-->
   <script src="<?= base_url() ?>assets/js/app.js"></script>
   </body>

   </html>