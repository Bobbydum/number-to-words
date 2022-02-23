<?php

namespace NumberToWords\NumberTransformer;

class HungarianNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new HungarianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-2000, 'mínusz kétezer'],
            [0, 'nulla'],
            [1, 'egy'],
            [2, 'kettő'],
            [3, 'három'],
            [4, 'négy'],
            [5, 'öt'],
            [6, 'hat'],
            [7, 'hét'],
            [8, 'nyolc'],
            [9, 'kilenc'],
            [10, 'tíz'],
            [11, 'tizenegy'],
            [12, 'tizenkettő'],
            [16, 'tizenhat'],
            [19, 'tizenkilenc'],
            [20, 'húsz'],
            [21, 'huszonegy'],
            [26, 'huszonhat'],
            [30, 'harminc'],
            [31, 'harmincegy'],
            [40, 'negyven'],
            [43, 'negyvenhárom'],
            [50, 'ötven'],
            [55, 'ötvenöt'],
            [60, 'hatvan'],
            [67, 'hatvanhét'],
            [70, 'hetven'],
            [79, 'hetvenkilenc'],
            [80, 'nyolcvan'],
            [90, 'kilencven'],
            [99, 'kilencvenkilenc'],
            [100, 'száz'],
            [101, 'százegy'],
            [111, 'száztizenegy'],
            [120, 'százhúsz'],
            [121, 'százhuszonegy'],
            [199, 'százkilencvenkilenc'],
            [203, 'kétszázhárom'],
            [287, 'kétszáznyolcvanhét'],
            [300, 'háromszáz'],
            [356, 'háromszázötvenhat'],
            [410, 'négyszáztíz'],
            [434, 'négyszázharmincnégy'],
            [578, 'ötszázhetvennyolc'],
            [689, 'hatszáznyolcvankilenc'],
            [729, 'hétszázhuszonkilenc'],
            [894, 'nyolcszázkilencvennégy'],
            [900, 'kilencszáz'],
            [909, 'kilencszázkilenc'],
            [919, 'kilencszáztizenkilenc'],
            [990, 'kilencszázkilencven'],
            [999, 'kilencszázkilencvenkilenc'],
            [1000, 'ezer'],
            [1001, 'ezeregy'],
            [1097, 'ezerkilencvenhét'],
            [1104, 'ezerszáznégy'],
            [1111, 'ezerszáztizenegy'],
            [1243, 'ezerkétszáznegyvenhárom'],
            [2000, 'kétezer'],
            [2001, 'kétezer-egy'],
            [2111, 'kétezer-száztizenegy'],
            [2385, 'kétezer-háromszáznyolcvanöt'],
            [3766, 'háromezer-hétszázhatvanhat'],
            [4000, 'négyezer'],
            [4196, 'négyezer-százkilencvenhat'],
            [5000, 'ötezer'],
            [5846, 'ötezer-nyolcszáznegyvenhat'],
            [6459, 'hatezer-négyszázötvenkilenc'],
            [7232, 'hétezer-kétszázharminckettő'],
            [8569, 'nyolcezer-ötszázhatvankilenc'],
            [9539, 'kilencezer-ötszázharminckilenc'],
            [11000, 'tizenegyezer'],
            [21000, 'huszonegyezer'],
            [31000, 'harmincegyezer'],
            [999000, 'kilencszázkilencvenkilencezer'],
            [999999, 'kilencszázkilencvenkilencezer-kilencszázkilencvenkilenc'],
            [1000000, 'egymillió'],
            [1001500, 'egymillió-ezer-ötszáz'],
            [2000000, 'kétmillió'],
            [2000001, 'kétmillió-egy'],
            [4000000, 'négymillió'],
            [5000000, 'ötmillió'],
            [8002001, 'nyolcmillió-kétezer-egy'],
            [999000000, 'kilencszázkilencvenkilencmillió'],
            [999000999, 'kilencszázkilencvenkilencmillió-kilencszázkilencvenkilenc'],
            [999999000, 'kilencszázkilencvenkilencmillió-kilencszázkilencvenkilencezer'],
            [999999999, 'kilencszázkilencvenkilencmillió-kilencszázkilencvenkilencezer-kilencszázkilencvenkilenc'],
            [1174315110, 'egymilliárd-százhetvennégymillió-háromszáztizenötezer-száztíz'],
            [1174315119, 'egymilliárd-százhetvennégymillió-háromszáztizenötezer-száztizenkilenc'],
            [1000000000, 'egymilliárd'],
            [2000000000, 'kétmilliárd'],
            [15174315119, 'tizenötmilliárd-százhetvennégymillió-háromszáztizenötezer-száztizenkilenc'],
            [35174315119, 'harmincötmilliárd-százhetvennégymillió-háromszáztizenötezer-száztizenkilenc'],
            [935174315119, 'kilencszázharmincötmilliárd-százhetvennégymillió-háromszáztizenötezer-száztizenkilenc'],
            [2935174315119, 'kétbillió-kilencszázharmincötmilliárd-százhetvennégymillió-háromszáztizenötezer-száztizenkilenc'],
        ];
    }
}
