<?php

namespace model;
class SearchStaffDto
{
    private string $attribute;

    private string $keyword;

    /**
     * @param string $attribute
     * @param string $keyword
     */
    public function __construct(string $attribute, string $keyword)
    {
        $this->attribute = $attribute;
        $this->keyword = $keyword;
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }

    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }

}