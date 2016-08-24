<?php

/**
 * Syntax hilighting a program source file. It calls enscript(1) to parse and
 * insert HTML tags to produce syntax hilighted version of the source. Since
 * the version of enscript I have does not support PHP hilighting, I will use
 * PHP's show_source() if the source file ends with .php.
 *
 * @param  $filename The filename of the source file to be transformed.
 * @return A text string containing syntax hilighting version of the source,
 *         in HTML.
 */
function syntax_hilight($filename) {
    if ((substr($filename, -4) == '.php')) {
        ob_start();
        show_source($filename);
        $buffer = ob_get_contents();
        ob_end_clean();
    } else {
        $argv = '-q -p - -E --language=html --color '.escapeshellcmd($filename);
        $buffer = array();

        exec("enscript $argv", $buffer);

        $buffer = join("\n", $buffer);
        $buffer = eregi_replace('^.*<PRE>',  '<pre>',  $buffer);
        $buffer = eregi_replace('</PRE>.*$', '</pre>', $buffer);
    }

    // Making it XHTML compatible.
    $buffer = eregi_replace('<FONT COLOR="', '<span style="color:', $buffer);
    $buffer = eregi_replace('</FONT>', '</style>', $buffer);

    return $buffer;
}

?>