<section class="content-header">
  <h1>Dashboard</h1>
</section>

<section class="content">

  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-newspaper-o"></i></span>

        <div class="info-box-content" align="right">
          <span class="info-box-text">Total Product</span>
          <span class="info-box-number"><?=$product?></span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>

        <div class="info-box-content" align="right">
          <span class="info-box-text">Total Member</span>
          <span class="info-box-number"><?=$member?></span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>
        <div class="info-box-content" align="right">
          <span class="info-box-text">Total Profit</span>
          <span class="info-box-number">IDR. <?=rupiah($profit)?></span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-shopping-cart"></i></span>
        <div class="info-box-content" align="right">
          <span class="info-box-text">Total Transaction</span>
          <span class="info-box-number"><?=rupiah($transaction)?></span>
        </div>
      </div>
    </div>
    
</section>