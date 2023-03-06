<div class="datatrue" data-datatrue="<?= $this->session->flashdata('true'); ?>"></div>
<div class="datafalse" data-datafalse="<?= $this->session->flashdata('false'); ?>"></div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; 2023 Nia Nur Afisah</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('asset/sbadmin/js/sb-admin-2.min.js'); ?>"></script>

<script src="<?= base_url('asset/datatables/jquery.datatables.min.js'); ?>"></script>
<script src="<?= base_url('asset/datatables/datatables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('asset/swall/dist/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('asset/js/swall.js'); ?>"></script>
<!-- <script src="<?= base_url('asset/js/script.js'); ?>"></script> -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

</body>

</html>