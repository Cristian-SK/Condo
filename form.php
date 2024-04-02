<?php
    session_start();
    include_once 'userheader.php';
    require_once("dbconnect.php");

    
?>


<center>
    <label>This makes a PDF with every Apartment with owners information</label>
  <div class="mt-3">
    <button type="button" class="pdf-button btn btn-primary btn-lg">
      <a href="table_apt.php" class="text-black">Make a PDF</a>
    </button>
  </div>
  <label>This makes a PDF with every Apartment with dedt information</label>
  <div class="mt-3">
    <button type="button" class="pdf-button btn btn-primary btn-lg">
      <a href="table_apt_quote.php" class="text-black">Make a PDF</a>
    </button>
  </div>
  <label>This makes a PDF with every Apartment with dedts</label>
  <div class="mt-3">
    <button type="button" class="pdf-button btn btn-primary btn-lg">
      <a href="table_apt_debts.php" class="text-black">Make a PDF</a>
    </button>
  </div>
  <label>This makes a PDF with every Apartment without any dedts</label>
  <div class="mt-3">
    <button type="button" class="pdf-button btn btn-primary btn-lg">
      <a href="table_apt_nodebts.php" class="text-black">Make a PDF</a>
    </button>
  </div>
  
</center>
</div>