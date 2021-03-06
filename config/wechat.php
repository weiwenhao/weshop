<?php

return [
    /*
     * Debug 模式，bool 值：true/false
     *
     * 当值为 false 时，所有的日志都不会记录
     */
    'debug'  => true,

    /*
     * 使用 Laravel 的缓存系统
     */
    'use_laravel_cache' => true,

    /*
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    'app_id'  => env('WECHAT_APPID', 'your-app-id'),         // AppID
    'secret'  => env('WECHAT_SECRET', 'your-app-secret'),     // AppSecret
//    'token'   => env('WECHAT_TOKEN', 'your-token'),          // Token
    'aes_key' => env('WECHAT_AES_KEY', ''),                    // EncodingAESKey

    /**
     * 开放平台第三方平台配置信息
     */
    //'open_platform' => [
        /**
         * 事件推送URL
         */
        //'serve_url' => env('WECHAT_OPEN_PLATFORM_SERVE_URL', 'serve'),
    //],
    
    /*
     * 日志配置
     *
     * level: 日志级别，可选为：
     *                 debug/info/notice/warning/error/critical/alert/emergency
     * file：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log' => [
        'level' => env('WECHAT_LOG_LEVEL', 'debug'),
        'file'  => env('WECHAT_LOG_FILE', storage_path('logs/wechat.log')),
    ],

    /*
     * OAuth 配置
     *
     * only_wechat_browser: 只在微信浏览器跳转
     * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
     * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
     */
    // 'oauth' => [
    //     'only_wechat_browser' => false,
    //     'scopes'   => array_map('trim', explode(',', env('WECHAT_OAUTH_SCOPES', 'snsapi_userinfo'))),
    //     'callback' => env('WECHAT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
    // ],

    /*
     * 微信支付
     */
     'payment' => [
         'merchant_id'        => env('WECHAT_PAYMENT_MERCHANT_ID', 'your-mch-id'), //商户id
         'key'                => env('WECHAT_PAYMENT_KEY', 'key-for-signature'),  //api接口安全
         'cert_path'          => env('WECHAT_PAYMENT_CERT_PATH', 'path/to/your/cert.pem'), //证书pem格式 XXX: 绝对路径！！！！
         'key_path'           => env('WECHAT_PAYMENT_KEY_PATH', 'path/to/your/key'),      //证书密钥pem格式 XXX: 绝对路径！！！！
         'notify_url'         => env('APP_URL').'/orders/notify',       // 你也可以在下单时单独设置来想覆盖它
         // 'device_info'     => env('WECHAT_PAYMENT_DEVICE_INFO', ''),
         // 'sub_app_id'      => env('WECHAT_PAYMENT_SUB_APP_ID', ''),
         // 'sub_merchant_id' => env('WECHAT_PAYMENT_SUB_MERCHANT_ID', ''),
         // ...
     ],

    /*
     * 开发模式下的免授权模拟授权用户资料
     *
     * 当 enable_mock 为 true 则会启用模拟微信授权，用于开发时使用，开发完成请删除或者改为 false 即可
     */
     'enable_mock' => env('WECHAT_ENABLE_MOCK', env('APP_DEBUG')),
     'mock_user' => [
         "openid" =>"ojRsVv5u3iizG1Qf7XyKKtajcDSA",
         // 以下字段为 scope 为 snsapi_userinfo 时需要
         "nickname" => "wei~",
         "sex" =>"1",
         "province" =>"广东",
         "city" =>"惠州",
         "country" =>"中国",
         "headimgurl" => "http://thirdwx.qlogo.cn/mmopen/vi_32/HnqXlFYA7ic5NedicSdGfQly8czwrvvJ1QWibtPYfjbQkYF9ibe7GhuibVyQ6GBZ7YdGA4KrUkjViakd4bT12ZFv8Y3w/132",
     ],
    /*'mock_user' => [
        "openid" =>"ojRsVvyIdzMpnpSdqZbEzp744Irc",
        // 以下字段为 scope 为 snsapi_userinfo 时需要
        "nickname" => "Hannah",
        "sex" =>"1",
        "province" =>"广东",
        "city" =>"惠州",
        "country" =>"中国",
        "headimgurl" => "https://avatars1.githubusercontent.com/u/2395166?v=3&s=40",
    ],*/

];
