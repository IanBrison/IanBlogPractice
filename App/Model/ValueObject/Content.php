<?php

namespace App\Model\ValueObject;

class Content {

	private $content;

	public function __construct(string $content) {
		$this->content = $content;
	}

	/*
	 * return the whole content in markdown
	 */
    public function display(): string {
    	// return "# Bravel Hi guys. This is a framework that I'm making for some reasons.";
    	return $this->content;
    }

    /*
     * return the content without the markdown stuff
     */
    public function displayWithoutMarkdown(): string {
        // return 'Yeah it is a fantastic post!!';
	    $markDownChars = array('#', '-');
	    return str_replace($markDownChars, '', $this->content);
    }
}
