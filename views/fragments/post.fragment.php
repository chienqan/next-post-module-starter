<?php if (!defined('APP_VERSION')) {
    die("Yo, what's up?");
} ?>

<div class="skeleton skeleton--full">
    <div class="clearfix">
        <aside class="skeleton-aside hide-on-medium-and-down">
            <div class="aside-list js-loadmore-content" data-loadmore-id="1"></div>

            <div class="loadmore pt-20 none">
                <a class="fluid button button--light-outline js-loadmore-btn js-autoloadmore-btn" data-loadmore-id="1" href="<?= APPURL."/e/".$idname."?aid=".$Account->get("id")."&ref=schedule" ?>">
                    <span class="icon sli sli-refresh"></span>
                    <?= __("Load More") ?>
                </a>
            </div>
        </aside>

        <section class="skeleton-content">
            <form class="js-auto-unfollow-schedule-form"
                  action="<?= APPURL."/e/".$idname."/".$Account->get("id") ?>"
                  method="POST">

                <input type="hidden" name="action" value="save">

                <div class="section-header clearfix">
                    <h2 class="section-title">
                        <?= htmlchars($Account->get("username")) ?>
                        <?php if ($Account->get("login_required")): ?>
                            <small class="color-danger ml-15">
                                <span class="mdi mdi-information"></span>    
                                <?= __("Re-login required!") ?>
                            </small>
                        <?php endif ?>  
                    </h2>
                </div>

                <div class="au-tab-heads clearfix">
                    <a href="<?= APPURL."/e/".$idname."/".$Account->get("id") ?>" class="active"><?= __("Settings") ?></a>
                </div>

                <div class="section-content">
                    <div class="form-result mb-25" style="display:none;"></div>

                    <div class="clearfix">
                        <div class="col s12 m12 l8">
                            
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>