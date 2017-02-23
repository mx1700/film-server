<?php

use Illuminate\Database\Seeder;

class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Film::create([
            'name' => '月光男孩',
            'cover' =>'cover/1.jpg',
            'background_image' => 'background/1.jpg',
            'introduction' => '　　奇伦（艾什顿·桑德斯 Ashton Sanders 饰）的母亲宝拉（娜奥米·哈里斯 Naomie Harris 饰）吸毒成瘾根本无心照顾孩子，奇伦从小在孤独中长大，因为过于瘦小的身材而时常遭到周围人的欺侮和作弄。一次偶然中，奇伦结识了毒贩胡安（马赫沙拉·阿里 Maher shala Ali 饰），从此，胡安和其女友特蕾莎（加奈儿·梦奈 Janelle Monae 饰）的住处成为了奇伦的第二个家。 ',
            'runtime' => 111,
            'tips' => '这里是提示信息'
        ]);

        \App\Film::create([
            'name' => '萨利机长',
            'cover' =>'cover/2.jpg',
            'background_image' => 'background/2.jpg',
            'introduction' => '　　影片根据真实事件改编，2009年1月15日，萨利（汤姆·汉克斯 Tom Hanks 饰）在全美航空1549号班担任机长，飞机起飞两分钟后遭到飞鸟攻击，两架发动机全部熄火，萨利决定在哈德逊河上迫降，155人全数生还。但之后的调查显示他做了错误的抉择，认为大可选择返回拉瓜地亚机场。机内到底发生了什么呢？',
            'runtime' => 96
        ]);

        \App\Film::create([
            'name' => '霸王别姬',
            'cover' =>'cover/3.jpg',
            'background_image' => 'background/3.jpg',
            'introduction' => '　　段小楼（张丰毅）与程蝶衣（张国荣）是一对打小一起长大的师兄弟，两人一个演生，一个饰旦，一向配合天衣无缝，尤其一出《霸王别姬》，更是誉满京城，为此，两人约定合演一辈子《霸王别姬》。但两人对戏剧与人生关系的理解有本质不同，段小楼深知戏非人生，程蝶衣则是人戏不分。 
　　段小楼在认为该成家立业之时迎娶了名妓菊仙（巩俐），致使程蝶衣认定菊仙是可耻的第三者，使段小楼做了叛徒，自此，三人围绕一出《霸王别姬》生出的爱恨情仇战开始随着时代风云的变迁不断升级，终酿成悲剧。',
            'runtime' => 171
        ]);
    }
}
