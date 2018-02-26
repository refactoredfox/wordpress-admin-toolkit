<div class="wrap">
    <h2>Toolkit Options and Settings</h2>
    <form method="post" action="options.php">
        <?php settings_fields('rf-admin-toolkit-main'); ?>

        <?php do_settings_sections(RF_ADMIN_TOOLKIT_PREFIX); ?>

        <?php submit_button(); ?>
    </form>
</div>
