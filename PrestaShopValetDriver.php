<?php

class PrestaShopValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     *
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return file_exists($sitePath . '/classes/PrestashopAutoload.php');
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     *
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        // Basic static file
        if (is_file($staticFilePath = "{$sitePath}/{$uri}")) {
            return $staticFilePath;
        }
        
        // RewriteRule ^c/([0-9]+)(\-[\.*_a-zA-Z0-9-]*)(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/c/$1$2$3.jpg [L]
        if (preg_match('/c\/([0-9]+)(\-[\.*_a-zA-Z0-9-]*)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/c/{$matches[1]}{$matches[2]}{$matches[3]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^c/([a-zA-Z_-]+)(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/c/$1$2.jpg [L]
        if (preg_match('/c\/([a-zA-Z_-]+)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/c/{$matches[1]}{$matches[2]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$3/$4/$5/$6/$7/$8/$1$2$3$4$5$6$7$8$9$10.jpg [L]
        if (preg_match('/([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[4]}/{$matches[5]}/{$matches[6]}/{$matches[7]}/{$matches[8]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}{$matches[5]}{$matches[6]}{$matches[7]}{$matches[8]}{$matches[9]}{$matches[10]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$3/$4/$5/$6/$7/$1$2$3$4$5$6$7$8$9.jpg [L]
        if (preg_match('/([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[4]}/{$matches[5]}/{$matches[6]}/{$matches[7]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}{$matches[5]}{$matches[6]}{$matches[7]}{$matches[8]}{$matches[9]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$3/$4/$5/$6/$1$2$3$4$5$6$7$8.jpg [L]
        if (preg_match('/([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[4]}/{$matches[5]}/{$matches[6]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}{$matches[5]}{$matches[6]}{$matches[7]}{$matches[8]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$3/$4/$5/$1$2$3$4$5$6$7.jpg [L]
        if (preg_match('/([0-9])([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[4]}/{$matches[5]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}{$matches[5]}{$matches[6]}{$matches[7]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$3/$4/$1$2$3$4$5$6.jpg [L]
        if (preg_match('/([0-9])([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[4]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}{$matches[5]}{$matches[6]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$3/$1$2$3$4$5.jpg [L]
        if (preg_match('/([0-9])([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[3]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}{$matches[5]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$2/$1$2$3$4.jpg [L]
        if (preg_match('/([0-9])([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[2]}/{$matches[1]}{$matches[2]}{$matches[3]}{$matches[4]}.jpg")) {
                return $staticFilePath;
            }
        }

        // RewriteRule ^([0-9])(\-[_a-zA-Z0-9-]*)?(-[0-9]+)?/.+\.jpg$ %{ENV:REWRITEBASE}img/p/$1/$1$2$3.jpg [L]
        if (preg_match('/([0-9])(\-[_a-zA-Z0-9-]*?)(-[0-9]+?)\/.+\.jpg/i', $uri, $matches)) {
            if (is_file($staticFilePath = "{$sitePath}/img/p/{$matches[1]}/{$matches[1]}{$matches[2]}{$matches[3]}.jpg")) {
                return $staticFilePath;
            }
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string $sitePath
     * @param  string $siteName
     * @param  string $uri
     *
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        //Legacy URls
        $parts = explode('/',$uri);
        if(isset($parts[1]) && $parts[1] !='' && file_exists($adminIdex = $sitePath . '/'. $parts[1] .'/index.php')){
            $_SERVER['SCRIPT_FILENAME'] = $adminIdex;
            if(isset($_GET['controller']) || isset($_GET['tab'])){
                return $adminIdex;
            }
            $_SERVER['REQUEST_URI'] = '/'.$parts[3].'/'.$parts[4];
            return $adminIdex;
        }
        $_SERVER['SCRIPT_FILENAME'] = $sitePath . '/index.php';
        return $sitePath . '/index.php';
    }
}
