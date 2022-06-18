@extends('admindesign')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<div class="card">
                <div class="card-body">
                  <h4 class="card-title">Admin Dashboard</h4>
                  <p class="card-description">
                    Admin Dashboard
                  </p>

                  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
<br><br>
                  <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>

                </div>

                  




              </div>



              <script>
var xValues = [];
  <?php
    foreach($prolist as $pro)
    {
      $na=$pro->productname;
      
      ?>
         var vl="<?= $na ?>";
          xValues.push(vl);
      <?php
    }
  ?>

var yValues = [];

<?php
foreach($prolist as $pro)
    {
       $pr=$pro->price;
      ?>
      var vl="<?=$pr ?>";
       yValues.push(vl);
      <?php
    }
  ?>


var barColors = ["red", "green","blue","orange","brown","pink", "purple","yellow","grey","skyblue"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Product"
    }
  }
});






var xValues1 = [];
<?php
foreach($orderlist as $ol)
    {
      $dm=$ol->month."-".$ol->year;
      
      ?>
         var vl="<?= $dm ?>";
          xValues1.push(vl);
      <?php
    }
  ?>


var yValues1 = [];

<?php
foreach($orderlist as $ol)
    {
      $t=$ol->data;
      
      ?>
         var vl="<?= $t ?>";
          yValues1.push(vl);
      <?php
    }
  ?>



var barColors1 = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart1", {
  type: "pie",
  data: {
    labels: xValues1,
    datasets: [{
      backgroundColor: barColors1,
      data: yValues1
    }]
  },
  options: {
    title: {
      display: true,
      text: "Month Wise Sale Report"
    }
  }
});



</script>

@endsection