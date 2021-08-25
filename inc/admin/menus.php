<style>
    .taga {
        padding: 10px;
        background-color: orange;
        color: white;
        font-size: 20px;
        border-radius: 5px;
        direction: rtl;
    }
</style>
<?php
//add action
add_action('admin_menu', 'wp_apis_register_menus');
//functions
function wp_apis_register_menus()
{
    add_menu_page(
        'پلاگین سفارشی',
        'پلاگین سفارشی',
        'manage_options',
        'wp_apis_admin',
        'wp_apis_main_menu_handler'


    );
    add_submenu_page(
        'wp_apis_admin',
        'کاربران',
        'کاربران',
        'manage_options',
        'wp_apis_users',
        'wp_apis_users_page'
    );
    add_submenu_page(
        'wp_apis_admin',
        'تنظیمات',
        'تنظیمات',
        'manage_options',
        'wp_apis_general',
        'wp_apis_general_page'
    );
}

//end function wp_apis_register_menus
function wp_apis_main_menu_handler()
{
    global $wpdb;
    
    @$action = $_GET['action'];

    if ($action == "delete") {
        $item = intval($_GET['item']);
        if ($item > 0) {
            $wpdb->delete($wpdb->prefix . 'sample', ['id' => $item]);
        }
    }
    if($action == "add")
    {
        if(isset($_POST['saveData'])){
            $wpdb->insert($wpdb->prefix . 'sample' , [
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'mobile' => $_POST['mobile']
            ]);
        }
        include WP_APIS_TPL . 'admin/menus/add.php';
    }else{
        $samples = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}sample");
        include WP_APIS_TPL . 'admin/menus/main.php';
    }


}

function wp_apis_general_page()
{
    if (isset($_POST['savesettings'])) {
        if (isset($_POST['is_plugin_active'])) {
            update_option('wp_apis_is_active', 1);
        } else {
            delete_option('wp_apis_is_active', 0);
        }

    }
    $current_plugin_status = get_option('wp_apis_is_option', 0);
    include WP_APIS_TPL . 'admin/menus/general.php';

}
function wp_apis_users_page()
{
    global $wpdb;
    $users = $wpdb->get_results("SELECT ID,user_email,display_name FROM {$wpdb->users}");
    include WP_APIS_TPL . 'admin/menus/users.php';
}