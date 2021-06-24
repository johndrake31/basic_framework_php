<?php

class Rendering
{

    /**
     * render recieves a string to pass to the template file path  
     * as a 2nd arguemnt recieves and array of variables 
     * used in the template to render.
     * 
     * @param string $template
     * @param array $donnes
     * @return void
     */
    public static function render(string $template, array $donnes): void
    {
        /**
         * extract is the opposite of compact run 
         * in the controller.
         * extract takes out all the variables passed through render and puts them onto the template
         */
        extract($donnes);

        /**
         * output buffer is magical.
         * ob_start() opens a buffer in which all output is
         *  stored. So every time you 
         * do an echo or other strings things, 
         * the output of that is 
         * added to the buffer.
         */
        ob_start();
        require_once "templates/$template.html.php";
        /**
         * The ob_get_clean() function returns the contents of the output buffer to $contenuDeLaPage and then deletes the contents from the buffer. -W3 Schools
         */
        $contenuDeLaPage = ob_get_clean();

        /** 
         * $contenuDeLaPage is a variable passed to 
         * "templates/layout.html.php" 
         * with the treated html string.
         */
        require_once "templates/layout.html.php";
    }
}
