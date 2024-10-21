<?php

   namespace Diaslasd\Tests;

   use Diaslasd\MarkdownToBash;
   use PHPUnit\Framework\TestCase;

   class MarkdownToBashTest extends TestCase
   {
       public function testConvert()
       {
           $markdown = "# Título\n\nUm texto qualquer.\n\n- Item 1\n- Item 2";
           $markdownToBash = new MarkdownToBash();
           $output = $markdownToBash->convert($markdown);

           $expectedOutput = "» Título\n\nUm texto qualquer.\n\n" .
               "\033[33m- Item 1\033[0m\n" .
               "\033[33m- Item 2\033[0m";

           $this->assertEquals($expectedOutput, $output);
       }
   }
   
