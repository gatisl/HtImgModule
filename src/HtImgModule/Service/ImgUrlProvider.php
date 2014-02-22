<?php
namespace HtImgModule\Service;

use HtImgModule\Options\CacheOptionsInterface;

class ImgUrlProvider implements ImgUrlProviderInterface
{
    const URl = 'htimg/display/';

    protected $options;

    public function __construct(CacheOptionsInterface $options)
    {
        $this->options = $options;
    }

    public function getUrl($relativeName, $filter = null)
    {
        $relativeName = rawurlencode($relativeName);
        if (!$this->options->getEnableCache()) {
             return static::URl . $relativeName .'?filter=' . $filter;
        }
        return static::URl . $this->options->getCachePrefix() . $relativeName;
    }
}