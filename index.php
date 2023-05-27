<?php include "includes/header.php" ?>


<!-- header-section end  -->

<!-- ref section -->
<?php
if (isset($_GET['ref'])) {
  $_SESSION['ref'] = $_GET['ref'];
  echo  '<input hidden type="text" value="' . $_GET['ref'] . '" class="form-control" name="ref" placeholder="Enter UserName">';
}
?>

<!-- hero start -->
<section style="padding-top: 220px;" class="hero bg_img" data-background="assets/images/bg/hero.jpg">
  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-8">
        <div class="hero__content">
          <h2 class="hero__title"><span class="text-white font-weight-normal"><B>
                Long-Term, Stable, Financial Investment Services</B></span></h2>
          <p class="text-white f-size-18 mt-3">Invest in an Industry Leader, Professional, and Reliable Company. We provide you with the most necessary features that will make your experience better. Not only we guarantee the fastest and the most exciting returns on your investments, but we also guarantee the security of your investment. We operate thoughtful innovation across asset classes and global markets.</p>
          <a href="registration.php" class="cmn-btn text-uppercase font-weight-600 mt-4">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- hero end -->


<!-- cureency section start -->
<div class="cureency-section">
  <div class="container">
    <div class="row mb-none-30">
      <div class="col-lg-3 col-sm-6 cureency-item mb-30">
        <div class="cureency-card text-center">
          <h6 class="cureency-card__title text-white">Successful Withdrawals</h6>
          <span class="cureency-card__amount h-font-family font-weight-600 base--color">984181012.87</span>
        </div><!-- cureency-card end -->
      </div><!-- cureency-item end -->
      <div class="col-lg-3 col-sm-6 cureency-item mb-30">
        <div class="cureency-card text-center">
          <h6 class="cureency-card__title text-white">TOTAL INVESTED</h6>
          <span class="cureency-card__amount h-font-family font-weight-600 base--color">76000450.09</span>
        </div><!-- cureency-card end -->
      </div><!-- cureency-item end -->
      <div class="col-lg-3 col-sm-6 cureency-item mb-30">
        <div class="cureency-card text-center">
          <h6 class="cureency-card__title text-white">24 VOLUME</h6>
          <span class="cureency-card__amount h-font-family font-weight-600 base--color">1,547.35</span>
        </div><!-- cureency-card end -->
      </div><!-- cureency-item end -->
      <div class="col-lg-3 col-sm-6 cureency-item mb-30">
        <div class="cureency-card text-center">
          <h6 class="cureency-card__title text-white">Referred Members</h6>
          <span class="cureency-card__amount h-font-family font-weight-600 base--color">85427</span>
        </div><!-- cureency-card end -->
      </div><!-- cureency-item end -->
    </div>
  </div>
</div>
<!-- cureency section end  -->


<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
    {
      "width": "100%",
      "height": "100%",
      "defaultColumn": "overview",
      "screener_type": "crypto_mkt",
      "displayCurrency": "USD",
      "colorTheme": "light",
      "locale": "en"
    }
  </script>
</div>
<!-- TradingView Widget END -->


<!-- about section start -->
<section class="about-section pt-120 pb-120 bg_img" data-background="assets/images/bg/bg-2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6">
        <div class="about-content">
          <h2 class="section-title mb-3"><span class="font-weight-normal">About</span> <b class="base--color">Us</b></h2>
          <p>GOLDENPROFIT IS AN INTERNATIONAL FINANCIAL COMPANY ENGAGED IN INVESTMENT ACTIVITIES, WHICH ARE RELATED TO TRADING ON FINANCIAL MARKETS PERFORMED BY QUALIFIED PROFESSIONAL TRADERS.</P>
          <p class="mt-4">OUR GOAL IS TO PROVIDE OUR INVESTORS WITH A RELIABLE SOURCE OF INCOME, WHILE MINIMIZING ANY POSSIBLE RISKS AND OFFERING A HIGH-QUALITY SERVICE, ALLOWING US TO AUTOMATE AND SIMPLIFY THE RELATIONS BETWEEN THE INVESTORS AND THE TRUSTEES. WE WORK TOWARDS INCREASING YOUR PROFIT MARGIN BY PROFITABLE INVESTMENT. WE LOOK FORWARD TO YOU BEING PART OF OUR COMMUNITY.</p>
          <a href="about.php" class="cmn-btn mt-4">MORE INFO</a>
        </div><!-- about-content end -->
      </div>
    </div>
  </div>
</section>
<!-- TradingView Widget BEGIN -->
<br>

<!-- video -->
<section class="about-section pt-120 pb-120 bg_img">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 offset-lg-12">
        </iframe><iframe width="100%" height="350" src="https://www.youtube.com/embed/HESbdnkQkfc" frameborder="1" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</section>

<!-- video end -->

<section class="pt-120 pb-120">
  <h2 style="text-align: center;" class="section-title"><span class="font-weight-normal">Currency Prices Live</span></h2>


  <div class="tradingview-widget-container" style="width: 100%; height: 450px;">
    <iframe style="width: 100%; height: 450px;" scrolling="no" allowtransparency="true" frameborder="0" src="https://s.tradingview.com/embed-widget/market-quotes/?locale=en#%7B%22width%22%3A1300%2C%22height%22%3A450%2C%22symbolsGroups%22%3A%5B%7B%22name%22%3A%22Indices%22%2C%22originalName%22%3A%22Indices%22%2C%22symbols%22%3A%5B%7B%22name%22%3A%22FOREXCOM%3ASPXUSD%22%2C%22displayName%22%3A%22S%26P%20500%22%7D%2C%7B%22name%22%3A%22FOREXCOM%3ANSXUSD%22%2C%22displayName%22%3A%22Nasdaq%20100%22%7D%2C%7B%22name%22%3A%22FOREXCOM%3ADJI%22%2C%22displayName%22%3A%22Dow%2030%22%7D%2C%7B%22name%22%3A%22INDEX%3ANKY%22%2C%22displayName%22%3A%22Nikkei%20225%22%7D%2C%7B%22name%22%3A%22INDEX%3ADEU30%22%2C%22displayName%22%3A%22DAX%20Index%22%7D%2C%7B%22name%22%3A%22FOREXCOM%3AUKXGBP%22%2C%22displayName%22%3A%22FTSE%20100%22%7D%5D%7D%2C%7B%22name%22%3A%22Commodities%22%2C%22originalName%22%3A%22Commodities%22%2C%22symbols%22%3A%5B%7B%22name%22%3A%22CME_MINI%3AES1!%22%2C%22displayName%22%3A%22E-Mini%20S%26P%22%7D%2C%7B%22name%22%3A%22CME%3A6E1!%22%2C%22displayName%22%3A%22Euro%22%7D%2C%7B%22name%22%3A%22COMEX%3AGC1!%22%2C%22displayName%22%3A%22Gold%22%7D%2C%7B%22name%22%3A%22NYMEX%3ACL1!%22%2C%22displayName%22%3A%22Crude%20Oil%22%7D%2C%7B%22name%22%3A%22NYMEX%3ANG1!%22%2C%22displayName%22%3A%22Natural%20Gas%22%7D%2C%7B%22name%22%3A%22CBOT%3AZC1!%22%2C%22displayName%22%3A%22Corn%22%7D%5D%7D%2C%7B%22name%22%3A%22Bonds%22%2C%22originalName%22%3A%22Bonds%22%2C%22symbols%22%3A%5B%7B%22name%22%3A%22CME%3AGE1!%22%2C%22displayName%22%3A%22Eurodollar%22%7D%2C%7B%22name%22%3A%22CBOT%3AZB1!%22%2C%22displayName%22%3A%22T-Bond%22%7D%2C%7B%22name%22%3A%22CBOT%3AUB1!%22%2C%22displayName%22%3A%22Ultra%20T-Bond%22%7D%2C%7B%22name%22%3A%22EUREX%3AFGBL1!%22%2C%22displayName%22%3A%22Euro%20Bund%22%7D%2C%7B%22name%22%3A%22EUREX%3AFBTP1!%22%2C%22displayName%22%3A%22Euro%20BTP%22%7D%2C%7B%22name%22%3A%22EUREX%3AFGBM1!%22%2C%22displayName%22%3A%22Euro%20BOBL%22%7D%5D%7D%2C%7B%22name%22%3A%22Forex%22%2C%22originalName%22%3A%22Forex%22%2C%22symbols%22%3A%5B%7B%22name%22%3A%22FX%3AEURUSD%22%7D%2C%7B%22name%22%3A%22FX%3AGBPUSD%22%7D%2C%7B%22name%22%3A%22FX%3AUSDJPY%22%7D%2C%7B%22name%22%3A%22FX%3AUSDCHF%22%7D%2C%7B%22name%22%3A%22FX%3AAUDUSD%22%7D%2C%7B%22name%22%3A%22FX%3AUSDCAD%22%7D%5D%7D%5D%2C%22colorTheme%22%3A%22light%22%2C%22isTransparent%22%3Afalse%2C%22utm_source%22%3A%22elitetrustmarket.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22market-quotes%22%7D" style="box-sizing: border-box; height: calc(418px); width: 1300px;"></iframe>
    <style>
      .tradingview-widget-copyright {
        font-size: 13px !important;
        line-height: 32px !important;
        text-align: center !important;
        vertical-align: middle !important;
        font-family: 'Trebuchet MS', Arial, sans-serif !important;
        color: #9db2bd !important;
      }

      .tradingview-widget-copyright .blue-text {
        color: #2962FF !important;
      }

      .tradingview-widget-copyright a {
        text-decoration: none !important;
        color: #9db2bd !important;
      }

      .tradingview-widget-copyright a:visited {
        color: #9db2bd !important;
      }

      .tradingview-widget-copyright a:hover .blue-text {
        color: #1E53E5 !important;
      }

      .tradingview-widget-copyright a:active .blue-text {
        color: #1848CC !important;
      }

      .tradingview-widget-copyright a:visited .blue-text {
        color: #2962FF !important;
      }
    </style>
  </div>
</section>
<!-- TradingView Widget END -->
<!-- bar chart ends -->

<!-- package section start -->
<section class="pt-120 pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Trading</span> <b class="base--color">Plans</b></h2>
          <p>To make a solid investment, you have to know where you are investing. Find a plan which is best for you.</p>
        </div>
      </div>
    </div><!-- row end -->

    <div class="row justify-content-center mb-none-30">
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
        <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">5% DAILY FOR 7 DAYS</h4>
          <div class="package-card__range mt-5 base--color">STARTER PLAN</div>
          <ul class="package-card__features mt-4">
            <li>Minimum Capital-$1,000</li>
            <li> Maximum Capital- $9,999</li>
            <li><i class="fa fa-users" aria-hidden="true"></i> Referral Commission 5%</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?investement=STARTER PLAN" class="cmn-btn btn-md mt-4">Invest Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
        <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">5.5% DAILY FOR 14 DAYS</h4>
          <div class="package-card__range mt-5 base--color">GOLD PLAN</div>
          <ul class="package-card__features mt-4">
            <li>Minimum Capital-$10,000</li>
            <li>Maximum Capital $49,999</li>
            <li><i class="fa fa-users" aria-hidden="true"></i> Referral Commission 5.5%</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?investement=GOLD PLAN" class="cmn-btn btn-md mt-4">Invest Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
        <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">7% DAILY FOR 21 DAYS</h4>
          <div class="package-card__range mt-5 base--color">PREMIUM PLAN</div>
          <ul class="package-card__features mt-4">
            <li>Minimum Capital- $50,000</li>
            <li>Maximum Capital- 99,999</li>
            <li><i class="fa fa-users" aria-hidden="true"></i> Referral Commission 7%</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?investement=PREMIUM PLAN"  class="cmn-btn btn-md mt-4">Invest Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
        <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">8% DAILY FOR ONE 28 DAYS</h4>
          <div class="package-card__range mt-5 base--color">PLATINUM PLAN</div>
          <ul class="package-card__features mt-4">
            <li>Minimum Capital- $100,000</li>
            <li> Maximum Capital- $499,999</li>
            <li><i class="fa fa-users" aria-hidden="true"></i> Referral Commission 8%</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?investement=PLATINUM PLAN"  class="cmn-btn btn-md mt-4">Invest Now</a>
        </div><!-- package-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
        <div class="package-card text-center bg_img" data-background="assets/images/bg/bg-4.png">
          <h4 class="package-card__title base--color mb-2">10% Daily For 31days</h4>
          <div class="package-card__range mt-5 base--color">EXLUSIVE VIP PLAN</div>
          <ul class="package-card__features mt-4">
            <li>Minimum Capital- $500,000</li>
            <li>Maximum Capital- Unlimited</li>
            <li><i class="fa fa-users" aria-hidden="true"></i> Referral Commission 10%</li>
            <li><i class="fa fa-comments" aria-hidden="true"></i> 24/7 Customer Support</li>
          </ul>
          <a href="deposit.php?investement=EXLUSIVE VIP PLAN" class="cmn-btn btn-md mt-4">Invest Now</a>
        </div><!-- package-card end -->
      </div>

    </div>
    <!-- row end -->
  </div>
</section>
<!-- package section end  -->


<!-- choose us section start -->
<section class="pt-120 pb-120 overlay--radial bg_img" data-background="assets/images/bg/bg-3.jpg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Why Choose</span> <b class="base--color">GOLDENPROFIT</b></h2>
          <p>Our goal is to provide our investors with a reliable source of income, while minimizing any possible risks and offering a high-quality service.</p>
        </div>
      </div>
    </div><!-- row end -->
    <div class="row justify-content-center mb-none-30">
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="lar la-copy"></i>
            </div>
            <h4 class="choose-card__title base--color">Legal Company</h4>
          </div>
          <p>Our company conducts absolutely legal activities in the legal field. We are certified to operate investment business, we are legal and safe.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-lock"></i>
            </div>
            <h4 class="choose-card__title base--color">High reliability</h4>
          </div>
          <p>We are trusted by a huge number of people. We are working hard constantly to improve the level of our security system and minimize possible risks.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-user-lock"></i>
            </div>
            <h4 class="choose-card__title base--color">Anonymity</h4>
          </div>
          <p>Anonymity and using cryptocurrency as a payment instrument. In the era of electronic money – this is one of the most convenient ways of cooperation.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-shipping-fast"></i>
            </div>
            <h4 class="choose-card__title base--color">Quick Withdrawal</h4>
          </div>
          <p>Our all retreats are treated spontaneously once requested. There are high maximum limits. The minimum withdrawal amount is only $10.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-users"></i>
            </div>
            <h4 class="choose-card__title base--color">Referral Program</h4>
          </div>
          <p>We are offering a certain level of referral income through our referral program. you can increase your income by simply refer a few people.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-headset"></i>
            </div>
            <h4 class="choose-card__title base--color">24/7 Support</h4>
          </div>
          <p>We provide 24/7 customer support through e-mail and telegram. Our support representatives are periodically available to elucidate any difficulty..</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-server"></i>
            </div>
            <h4 class="choose-card__title base--color">Dedicated Server</h4>
          </div>
          <p>We are using a dedicated server for the website which allows us exclusive use of the resources of the entire server.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="fab fa-expeditedssl"></i>
            </div>
            <h4 class="choose-card__title base--color">SSL Secured</h4>
          </div>
          <p>Comodo Essential-SSL Security encryption confirms that the presented content is genuine and legitimate.</p>
        </div><!-- choose-card end -->
      </div>
      <div class="col-xl-4 col-md-6 mb-30">
        <div class="choose-card border-radius--5">
          <div class="choose-card__header mb-3">
            <div class="choose-card__icon">
              <i class="las la-shield-alt"></i>
            </div>
            <h4 class="choose-card__title base--color">DDOS Protection</h4>
          </div>
          <p>We are using one of the most experienced, professional, and trusted DDoS Protection and mitigation provider.</p>
        </div><!-- choose-card end -->
      </div>
    </div>
  </div>
</section>
<!-- choose us section end  -->


<!-- government approve section us section start -->
<!-- <section class="pt-120 pb-120 overlay--radial bg_img" data-background="assets/images/bg/bg-3.jpg">
  <div class="container">
    <div class="row">
      <div style="background-color: white;" class="col-lg-6 mb-30">
        <img width="100%" src="img/Govt-Approved-courses-by-skooltek.png" alt="">
      </div>
      <div style="background-color: white;" class="col-lg-6 mb-30">
        <img width="100%" src="img/1627557391619.png" alt="">
      </div>
    </div>
  </div>
</section> -->
<!-- choose us section end  -->


<!-- profit calculator section start -->
<section class="pt-120 pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="section-header text-center">
          <h2 class="section-title"><span class="font-weight-normal">Profit</span> <b class="base--color">Calculator</b></h2>
          <p>You must know the calculation before investing in any plan, so you never make mistakes. Check the calculation and you will get as our calculator says.</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <div class="profit-calculator-wrapper">
          <form id="cal" class="profit-calculator">
            <div class="row mb-none-30">
              <div class="col-lg-6 mb-30">
                <label>Choose Plan</label>
                <select id="plans" class="base--bg">
                  <option>Starter Plan</option>
                  <option>GOLD PLAN</option>
                  <option>PREMIUM PLAN</option>
                  <option>PLATINUM PLAN</option>
                  <option>EXLUSIVE VIP PLAN</option>
                  <option>ANTMINER D3</option>
                  <option>DRAGONMINTER T16</option>
                  <option>PAGOLIN MINER M3X</option>
                  <option>AVALONMINER 741</option>
                </select>
              </div>
              <div class="col-lg-6 mb-30">
                <label>Invest Amount</label>
                <input type="number" id="madert" name="invest_amount" id="invest_amount" placeholder="0.00" class="total_amount form-control base--bg">
              </div>
              <div class="col-lg-12 mb-30">
                <label>Profit Amount</label>
                <input type="text" name="profit_amount" id="profit_amount" placeholder="0.00" class="form-control base--bg" disabled>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- profit calculator section end -->
<style>
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
  }
</style>

<script>
  $('.total_amount').val();
  $('#plans').val();
  $('#madert').keyup(function() {


    //for starter plan
    $('.total_amount').val() >= 1000 && $('#plans').val() == "Starter Plan" && Starter_Plan($('.total_amount').val());

    //for Professional Plan
    $('.total_amount').val() >= 10000 && $('#plans').val() == "GOLD PLAN" && Professional_Plan($('.total_amount').val());

    //for Enterprise Plan
    $('.total_amount').val() >= 50000 && $('#plans').val() == "PREMIUM PLAN" && Enterprise_Plan($('.total_amount').val());

    //for Compounding Mode
    $('.total_amount').val() >= 100000 && $('#plans').val() == "PLATINUM PLAN" && Compounding_Mode($('.total_amount').val());

    //for Compounding Mode 1
    $('.total_amount').val() >= 500000 && $('#plans').val() == "EXLUSIVE VIP PLAN" && Compounding_Mode_1($('.total_amount').val());


    $('.total_amount').val() <= 99 && $('#profit_amount').attr("placeholder", "0.00");;

    ///for mininfg plans
    //for starter plan
    $('.total_amount').val() >= 100 && $('#plans').val() == "ANTMINER D3" && ANTMINER($('.total_amount').val());

    //for Professional Plan
    $('.total_amount').val() >= 20000 && $('#plans').val() == "PAGOLIN MINER M3X" && PAGOLIN($('.total_amount').val());

    //for Enterprise Plan
    $('.total_amount').val() >= 1000 && $('#plans').val() == "DRAGONMINTER T16" && DRAGONMINTER($('.total_amount').val());

    //for Compounding Mode
    $('.total_amount').val() >= 50000 && $('#plans').val() == "AVALONMINER 741" && AVALONMINER($('.total_amount').val());


  });

  function Compounding_Mode_1(amount) {
    let percentage = 10;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 14);
  }

  function Compounding_Mode(amount) {
    let percentage = 8;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 30);
  }

  function Enterprise_Plan(amount) {
    let percentage = 7;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 10);
  }

  function Professional_Plan(amount) {
    let percentage = 5.5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 7);
  }

  function Starter_Plan(amount) {
    let percentage = 5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 3);
  }

  function AVALONMINER(amount) {
    let percentage = 10;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 28);
  }

  function PAGOLIN(amount) {
    let percentage = 7;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 21);
  }

  function DRAGONMINTER(amount) {
    let percentage = 5.5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 14);
  }

  function ANTMINER(amount) {
    let percentage = 5;
    let amount_with_percentage = (percentage / 100) * amount;
    $('#profit_amount').attr("placeholder", amount_with_percentage * 7);
  }
</script>

<!-- how work section start -->
<section class="pt-120 pb-120 bg_img" data-background="assets/images/bg/bg-5.jpg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">How</span> <b class="base--color">GOLDENPROFIT</b> <span class="font-weight-normal">Works</span></h2>
          <p>Get involved in our tremendous platform and Invest. We will utilize your money and give you profit in your wallet automatically.</p>
        </div>
      </div>
    </div><!-- row end -->
    <div class="row justify-content-center mb-none-30">
      <div class="col-lg-4 col-md-6 work-item mb-30">
        <div class="work-card text-center">
          <div class="work-card__icon">
            <i class="las la-user base--color"></i>
            <span class="step-number">01</span>
          </div>
          <div class="work-card__content">
            <h4 class="base--color mb-3">Create Account</h4>
          </div>
        </div><!-- work-card end -->
      </div>
      <div class="col-lg-4 col-md-6 work-item mb-30">
        <div class="work-card text-center">
          <div class="work-card__icon">
            <i class="las la-hand-holding-usd base--color"></i>
            <span class="step-number">02</span>
          </div>
          <div class="work-card__content">
            <h4 class="base--color mb-3">Invest To Plan</h4>
          </div>
        </div><!-- work-card end -->
      </div>
      <div class="col-lg-4 col-md-6 work-item mb-30">
        <div class="work-card text-center">
          <div class="work-card__icon">
            <i class="las la-wallet base--color"></i>
            <span class="step-number">03</span>
          </div>
          <div class="work-card__content">
            <h4 class="base--color mb-3">Get Profit</h4>
          </div>
        </div><!-- work-card end -->
      </div>
    </div>
  </div>
</section>
<!-- how work section end  -->


<!-- faq section start -->
<section class="pt-120 pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Frequently Asked</span> <b class="base--color">Questions</b></h2>
          <p>We answer some of your Frequently Asked Questions regarding our platform. If you have a query that is not answered here, Please contact us.</p>
        </div>
      </div>
    </div><!-- row end -->
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="accordion cmn-accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="las la-question-circle"></i>
                  <span>When can I deposit/withdraw from my Investment account?</span>
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
               Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="las la-question-circle"></i>
                  <span>How do I check my account balance?</span>
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                You can see this anytime on your accounts dashboard. You can see this anytime on your accounts dashboard.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <i class="las la-question-circle"></i>
                  <span>I forgot my password, what should I do?</span>
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                Visit the password reset page, type in your email address and click the `Reset` button. Visit the password reset page, type in your email address and click the `Reset` button.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFour">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <i class="las la-question-circle"></i>
                  <span>How will I know that the withdrawal has been successful?</span>
                </button>
              </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                You will get an automatic notification once we send the funds and you can always check your transactions or account balance. Your chosen payment system dictates how long it will take for the funds to reach you. You will get an automatic notification once we send the funds and you can always check your transactions or account balance. Your chosen payment system dictates how long it will take for the funds to reach you.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingFive">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <i class="las la-question-circle"></i>
                  <span>How much can I withdraw?</span>
                </button>
              </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
                You can withdraw the full amount of your account balance minus the funds that are used currently for supporting opened positions. You can withdraw the full amount of your account balance minus the funds that are used currently for supporting opened positions.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- faq section end -->


<!-- testimonial section start -->
<!-- <section class="pt-120 pb-120 bg_img overlay--radial" data-background="assets/images/bg/bg-7.jpg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">What Users Say</span> <b class="base--color">About Us</b></h2>
         </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="testimonial-slider">
          <div class="single-slide">
            <div class="testimonial-card">
              <div class="testimonial-card__content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos minus, assumenda soluta unde veritatis voluptatibus adipisci, aliquid, non officiis repudiandae rerum porro odio ea laborum veniam numquam doloribus obcaecati.</p>
              </div>
              <div class="testimonial-card__client">
                <div class="thumb">
                  <img src="assets/images/testimonial/1.jpg" alt="image">
                </div>
                <div class="content">
                  <h6 class="name">Fahaddevs</h6>
                  <span class="designation">CEO of fahaddevs</span>
                  <div class="ratings">
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="single-slide">
            <div class="testimonial-card">
              <div class="testimonial-card__content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos minus, assumenda soluta unde veritatis voluptatibus adipisci, aliquid, non officiis repudiandae rerum porro odio ea laborum veniam numquam doloribus obcaecati.</p>
              </div>
              <div class="testimonial-card__client">
                <div class="thumb">
                  <img src="assets/images/testimonial/2.jpg" alt="image">
                </div>
                <div class="content">
                  <h6 class="name">Alina</h6>
                  <span class="designation">CTO of fahaddevs</span>
                  <div class="ratings">
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="single-slide">
            <div class="testimonial-card">
              <div class="testimonial-card__content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos minus, assumenda soluta unde veritatis voluptatibus adipisci, aliquid, non officiis repudiandae rerum porro odio ea laborum veniam numquam doloribus obcaecati.</p>
              </div>
              <div class="testimonial-card__client">
                <div class="thumb">
                  <img src="assets/images/testimonial/3.jpg" alt="image">
                </div>
                <div class="content">
                  <h6 class="name">Amir Khan</h6>
                  <span class="designation">COO of fahaddevs</span>
                  <div class="ratings">
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="single-slide">
            <div class="testimonial-card">
              <div class="testimonial-card__content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos minus, assumenda soluta unde veritatis voluptatibus adipisci, aliquid, non officiis repudiandae rerum porro odio ea laborum veniam numquam doloribus obcaecati.</p>
              </div>
              <div class="testimonial-card__client">
                <div class="thumb">
                  <img src="assets/images/testimonial/4.jpg" alt="image">
                </div>
                <div class="content">
                  <h6 class="name">Zohir Khan</h6>
                  <span class="designation">Manager of fahaddevs</span>
                  <div class="ratings">
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                    <i class="las la-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- testimonial section end -->


<!-- data section start -->
<section class="pt-120 pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Our Latest</span> <b class="base--color">Transaction</b></h2>
          <p>Here is the log of the most recent transactions including withdraw and deposit made by our users.</p>
        </div>
      </div>
    </div><!-- row end -->
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <ul class="nav nav-tabs custom--style-two justify-content-center" id="transactionTab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="deposit-tab" data-toggle="tab" href="#deposit" role="tab" aria-controls="deposit" aria-selected="true">Latest Deposit</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" id="withdraw-tab" data-toggle="tab" href="#withdraw" role="tab" aria-controls="withdraw" aria-selected="false">Latest Withdraw</a>
          </li>
        </ul>

        <div class="tab-content mt-4" id="transactionTabContent">
          <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
            <div class="table-responsive--sm">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Gateway</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM latest_deposit ORDER BY RAND()";
                  $details = mysqli_query($connection, $query);
                  $count = mysqli_num_rows($details);
                  while ($row = mysqli_fetch_assoc($details)) {
                  ?>
                    <tr>
                      <td data-label="Name">
                        <div class="user">
                          <div class="thumb"><img src="img/<?php echo $row["user_img"]; ?>" alt="image"></div>
                          <span><?php echo $row["user_name"]; ?></span>
                        </div>
                      </td>
                      <td data-label="Date"><?php
                                            $start = strtotime('2022-01-01');
                                            $start = strtotime("-262800 minute", strtotime(date("Y-m-d")));
                                            $end = time();
                                            $timestamp = mt_rand($start, $end);
                                            echo date("F jS, Y", $timestamp);
                                            ?></td>
                      <td data-label="Amount">$<?php echo number_format(ceil(rand($row["amount"], 10000) / 100) * 50); ?></td>
                      <td data-label="Gateway"><?php

                                                // Declare an associative array
                                                $arr = array("a" => "BITCOIN", "b" => "TRON", "c" => "USDT", "d" => "BITCOIN CASH", "e" => "ETHEREUM");

                                                // Use array_rand function to returns random key
                                                $key = array_rand($arr);

                                                // Display the random array element
                                                echo $arr[$key];

                                                ?></td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
            <div class="table-responsive--md">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Gateway</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM latest_withdrawal ORDER BY RAND()";
                  $details = mysqli_query($connection, $query);
                  $count = mysqli_num_rows($details);
                  while ($row = mysqli_fetch_assoc($details)) {
                  ?>
                    <tr>
                      <td data-label="Name">
                        <div class="user">
                          <div class="thumb"><img src="img/<?php echo $row["user_img"]; ?>" alt="image"></div>
                          <span><?php echo $row["user_name"]; ?></span>
                        </div>
                      </td>
                      <td data-label="Date"><?php
                                            $start = strtotime('2022-01-01');
                                            $start = strtotime("-262800 minute", strtotime(date("Y-m-d")));
                                            $end = time();
                                            $timestamp = mt_rand($start, $end);
                                            echo date("F jS, Y", $timestamp);
                                            ?></td>
                      <td data-label="Amount">$<?php echo number_format(ceil(rand($row["amount"], 10000) / 100) * 50); ?></td>
                      <td data-label="Gateway"><?php

                                                // Declare an associative array
                                                $arr = array("a" => "BITCOIN", "b" => "TRON", "c" => "USDT", "d" => "BITCOIN CASH", "e" => "ETHEREUM");

                                                // Use array_rand function to returns random key
                                                $key = array_rand($arr);

                                                // Display the random array element
                                                echo $arr[$key];

                                                ?></td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- tab-content end -->
      </div>
    </div>
  </div>
</section>
<!-- data section end -->


<!-- top investor section start -->
<section class="pt-120 pb-120 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Our Top</span> <b class="base--color">Investor</b></h2>
        </div>
      </div>
    </div><!-- row end -->
    <div class="row justify-content-center mb-none-30">
      <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
        <div class="investor-card border-radius--5">
          <div class="investor-card__thumb bg_img background-position-y-top" data-background="img/1627649799611.jpg"></div>
          <div class="investor-card__content">
            <h6 class="name">luan</h6>
            <span class="amount f-size-14">Investment - $101,360</span>
          </div>
        </div><!-- investor-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
        <div class="investor-card border-radius--5">
          <div class="investor-card__thumb bg_img background-position-y-top" data-background="img/1627649799619.jpg"></div>
          <div class="investor-card__content">
            <h6 class="name">Missleequan</h6>
            <span class="amount f-size-14">Investment - $94,152</span>
          </div>
        </div><!-- investor-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
        <div class="investor-card border-radius--5">
          <div class="investor-card__thumb bg_img background-position-y-top" data-background="img/1627649799650.jpg"></div>
          <div class="investor-card__content">
            <h6 class="name">MissMieke</h6>
            <span class="amount f-size-14">Investment - $50,110</span>
          </div>
        </div><!-- investor-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
        <div class="investor-card border-radius--5">
          <div class="investor-card__thumb bg_img background-position-y-top" data-background="img/1627649799485.jpg"></div>
          <div class="investor-card__content">
            <h6 class="name">Mandlaxlady</h6>
            <span class="amount f-size-14">Investment - $25,161</span>
          </div>
        </div><!-- investor-card end -->
      </div>
      <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
        <div class="investor-card border-radius--5">
          <div class="investor-card__thumb bg_img background-position-y-top" data-background="img/1627649799517.jpg"></div>
          <div class="investor-card__content">
            <h6 class="name">SirBenerd</h6>
            <span class="amount f-size-14">Investment - $132,770</span>
          </div>
        </div><!-- investor-card end -->
      </div>
    </div>
  </div>
</section>
<!-- top investor section end -->


<!-- cta section start -->
<section class="pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-8">
        <div class="cta-wrapper bg_img border-radius--10 text-center" data-background="assets/images/bg/bg-8.jpg">
          <h2 class="title mb-3">Get Started Today With Us</h2>
          <p>This is a Revolutionary Money Making Platform! Invest for Future in Stable Platform and Make Fast Money. Not only we guarantee the fastest and the most exciting returns on your investments, but we also guarantee the security of your investment.</p>
          <a href="https://t.me/meritaspartners" class="cmn-btn mt-4">Join Us on telergram <i class="fab fa-telegram"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- cta section end -->

<!-- payment brand section start -->
<section class="pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-header">
          <h2 class="section-title"><span class="font-weight-normal">Payment We</span> <b class="base--color">Accept</b></h2>
          <p>We accept all major cryptocurrencies and fiat payment methods to make your investment process easier with our platform.</p>
        </div>
      </div>
    </div><!-- row end -->
    <div class="row">
      <div class="col-lg-12">
        <div class="payment-slider">
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/1.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/2.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/3.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/4.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/5.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/6.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/7.png" alt="image">
            </div><!-- brand-item end -->
          </div>
          <div class="single-slide">
            <div class="brand-item">
              <img src="assets/images/brand/8.png" alt="image">
            </div><!-- brand-item end -->
          </div>
        </div><!-- payment-slider end -->
      </div>
    </div>
  </div>
</section>
<!-- payment brand section end -->



<!-- subscribe section start -->
<section class="pb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="subscribe-wrapper bg_img" data-background="assets/images/bg/bg-5.jpg">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <h2 class="title">Subscribe Our Newsletter</h2>
            </div>
            <div class="col-lg-7 mt-lg-0 mt-4">
              <form class="subscribe-form">
                <input type="email" class="form-control" placeholder="Email Address">
                <button class="subscribe-btn"><i class="las la-envelope"></i></button>
              </form>
            </div>
          </div>
        </div><!-- subscribe-wrapper end -->
      </div>
    </div>
  </div>
</section>


<!-- subscribe section end -->


<!-- footer section start -->
<?php include "includes/footer.php" ?>