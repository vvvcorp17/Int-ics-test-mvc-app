<div class="mt-5 pt-5">
    <!-- Second row -->
    <div class="row mt-5">
        <div class="col-md-12 text-center mb-5">
            <h2 class="h2-responsive wow fadeIn mb-4 animated" data-wow-delay="0.2s"
                style="font-weight: 500; visibility: visible; animation-name: fadeIn; animation-iteration-count: 1; animation-delay: 0.2s;">
                400 Invalid request</h2>
            <p class="wow fadeIn animated" data-wow-delay="0.4s"
               style="font-size: 1.25rem; visibility: visible; animation-name: fadeIn; animation-iteration-count: 1; animation-delay: 0.4s;">
                <?= \App\Handlers\OutputData::get('message') ?></p>

            <ul class="err-404-navigation-links wow fadeIn mt-4 animated" data-wow-delay="0.6s"
                style="visibility: visible; animation-name: fadeIn; animation-iteration-count: 1; animation-delay: 0.6s;">
                <li><a href="/">Home</a></li>
            </ul>
        </div>
    </div>
    <!-- /.Second row -->

</div>