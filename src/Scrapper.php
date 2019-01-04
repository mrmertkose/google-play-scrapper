<?php

namespace GooglePlay;

use DiDom\Document;

class Scrapper
{

    private $base_url = "https://play.google.com/store/apps/details?id=";
    private $document = null;

    public function __construct($package_name = "com.tencent.ig", $lang = "tr")
    {
        $this->document = new Document($this->base_url . $package_name . "&hl=" . $lang, true);
    }

    public function get_title()
    {
        return $this->document->first("h1[class=AHFaub]")->text();
    }

    public function get_category()
    {
        return $this->document->find("div[class=ZVWMWc] > div[class=i4sPve] > span[class=T32cc UAO9ie]")[1]->text();
    }

    public function get_developer()
    {
        return $this->document->find("div[class=ZVWMWc] > div[class=i4sPve] > span[class=T32cc UAO9ie]")[0]->text();
    }

    public function get_image()
    {
        return $this->document->first("img[class=T75of ujDFqe]")->attr("src");
    }

    public function get_content_text()
    {
        return $this->document->first("div[jsname=sngebd]")->text();
    }

    public function get_content_html()
    {
        return $this->document->first("div[jsname=sngebd]")->html();
    }

    public function get_updated()
    {
        return $this->document->find("span[class=htlgb] > div[class=IQ1z0d] > span[class=htlgb]")[0]->text();
    }

    public function get_size()
    {
        return $this->document->find("span[class=htlgb] > div[class=IQ1z0d] > span[class=htlgb]")[1]->text();
    }

    public function get_installs()
    {
        return $this->document->find("span[class=htlgb] > div[class=IQ1z0d] > span[class=htlgb]")[2]->text();
    }

    public function get_version()
    {
        return $this->document->find("span[class=htlgb] > div[class=IQ1z0d] > span[class=htlgb]")[3]->text();
    }

    public function get_editor_choice()
    {
        return $this->document->has("span[class=giozf]") ? 1 : 0;
    }

    public function get_video()
    {
        return count($element = $this->document->first('button[class=lgooh  ]')) > 0 ? $element->attr("data-trailer-url") : "Not Found";
    }

    public function get_gallery()
    {
        $data = $this->document->find("button[class=NIc6yf] > img[itemprop=image]");
        $gallery = [];
        foreach ($data as $item) {
            $gallery[] = $item->attr("src");
        }
        return $gallery;
    }

    public function get_price()
    {
        return $this->document->first("button[class=LkLjZd ScJHi HPiPcc IfEcue  ]")->attr("aria-label");
    }


}