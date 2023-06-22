<div class="row mt-5 justify-content-center">
    <div class="col-md-4 text-center">
        <form action="/" method="post">
            <input type="hidden" name="csrf" value="<?=\App\Handlers\CSRF::token() ?>">
            <div class="form-outline">
                <!-- TODO required -->
                <textarea class="form-control" id="textAreaExample" rows="4" name="body"></textarea>
                <label class="form-label" for="textAreaExample">Message</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Button</button>
        </form>
    </div>
</div>

<?php $messages = \App\Handlers\OutputData::get('messages'); ?>
<?php if ($messages) { ?>
    <?php foreach ($messages as $message) { ?>
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"># <?= $message->getId() ?></h5>
                        <p class="card-text"><?= str_replace(["\r\n", "\n", " "], ["<br>", "<br>", "&nbsp"], $message->getBody()) ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
