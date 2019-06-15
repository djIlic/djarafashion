<?php

$word = new COM("Word.Application");
$word->Visible = true;
$word->Documents->Add();
$word->Selection->TypeText("Аутор сајта је Ђорђе Илић. Рођен је 29.4.1997. године. Завршио је Гимназију „Бранислав Петронијевић“ на Убу. Тренутно студира на Високој ICT школи. Завршио је Школу основног музичког образовања „Петар Стојановић“ на Убу, одсек за виолину. \n djordje.ilic.112.16@ict.edu.rs");
$word->Documents[1]->SaveAs("o-autoru.doc");
