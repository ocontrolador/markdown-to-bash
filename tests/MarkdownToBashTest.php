<?php

namespace Diaslasd;

use PHPUnit\Framework\TestCase;

class MarkdownToBashTest extends TestCase
{
    private MarkdownToBash $markdownToBash;

    protected function setUp(): void
    {
        $this->markdownToBash = new MarkdownToBash();
    }

    public function testFormatMarkdownString(): void
    {
        $markdown = "# Título 1\n\n## Título 2\n\n- Item 1\n- Item 2\n\n**Negrito**\n\n*Itálico*\n\n[Link](https://www.example.com)\n\n| Coluna 1 | Coluna 2 |\n|---|---|";
        $expected = '» [46m[1mTítulo 1[0m

»» [46m[1mTítulo 2[0m
[33m
- Item 1[0m
[33m- Item 2[0m

[1mNegrito[0m

[4mItálico[0m

[4mLink[0m ([34mhttps://www.example.com[0m)

[36mColuna 1       [0m[36mColuna 2       [0m
[36m---            [0m[36m---            [0m'; 
        $this->assertEquals($expected, $this->markdownToBash->convert($markdown));
    }

    public function testConvertWithCodeBlock(): void
    {
        $markdown = "# Título\n\n
php\n<?php\necho 'Olá, mundo!';\n
👾 ";
      $expected = "» [46m[1mTítulo[0m

php
<?php
echo 'Olá, mundo!';

👾 "; 
        $this->assertEquals($expected, $this->markdownToBash->convert($markdown));
    }

    public function testConvertWithoutCodeBlock(): void
    {
        $markdown = "# Título\n\n- Item 1\n- Item 2";
        $expected = '» [46m[1mTítulo[0m
[33m
- Item 1[0m
[33m- Item 2[0m';
        $this->assertEquals($expected, $this->markdownToBash->convert($markdown));
    }
}

