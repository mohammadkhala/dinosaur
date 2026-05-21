<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Service;
use App\Models\PortfolioItem;
use App\Models\Client;
use App\Models\WhyItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Dinosaur Admin',
            'email' => 'admin@dinosaur.ps',
            'password' => Hash::make('admin123'),
        ]);

        // Site settings
        $settings = [
            ['key' => 'site_name_ar', 'value' => 'ديناصور ميديا', 'group' => 'general'],
            ['key' => 'site_name_en', 'value' => 'Dinosaur Media', 'group' => 'general'],
            ['key' => 'site_tagline_ar', 'value' => 'نُطوّر أعمالكم رقمياً', 'group' => 'general'],
            ['key' => 'site_tagline_en', 'value' => 'We Digitally Elevate Your Business', 'group' => 'general'],
            ['key' => 'founded_year', 'value' => '2016', 'group' => 'general'],
            ['key' => 'projects_count', 'value' => '200', 'group' => 'stats'],
            ['key' => 'clients_count', 'value' => '100', 'group' => 'stats'],
            ['key' => 'experience_years', 'value' => '8', 'group' => 'stats'],
            ['key' => 'services_count', 'value' => '5', 'group' => 'stats'],
            ['key' => 'phone', 'value' => '+972 594 640 044', 'group' => 'contact'],
            ['key' => 'whatsapp', 'value' => '972594640044', 'group' => 'contact'],
            ['key' => 'email', 'value' => 'info@dinosaur.ps', 'group' => 'contact'],
            ['key' => 'address_ar', 'value' => 'الخليل — دوار المنارة — بناية المنارة، الطابق الخامس', 'group' => 'contact'],
            ['key' => 'address_en', 'value' => 'Hebron — Al-Manara Roundabout — Al-Manara Building, 5th Floor', 'group' => 'contact'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/dinosaur.palestine', 'group' => 'social'],
            ['key' => 'instagram', 'value' => 'https://instagram.com/dinosaur.palestine', 'group' => 'social'],
            ['key' => 'linkedin', 'value' => 'https://linkedin.com/company/dinosaur-palestine', 'group' => 'social'],
            ['key' => 'behance', 'value' => 'https://behance.net/dinosaurpalestine', 'group' => 'social'],
            ['key' => 'about_ar', 'value' => 'نحن ديناصور ميديا — وكالة إبداعية فلسطينية تأسست عام 2016 في الخليل. نتخصص في تقديم خدمات تطوير الأعمال الرقمية للأفراد والشركات الخاصة.', 'group' => 'about'],
            ['key' => 'about_en', 'value' => 'We are Dinosaur Media — a Palestinian creative agency founded in 2016 in Hebron. We specialize in providing digital business development services for individuals and private companies.', 'group' => 'about'],
            ['key' => 'hero_badge_ar', 'value' => 'وكالة إبداعية رائدة · الخليل، فلسطين · منذ 2016', 'group' => 'hero'],
            ['key' => 'hero_badge_en', 'value' => 'Leading Creative Agency · Hebron, Palestine · Since 2016', 'group' => 'hero'],
        ];
        foreach ($settings as $s) Setting::create($s);

        // Services
        $services = [
            ['icon'=>'🎨','title_ar'=>'الهوية البصرية','title_en'=>'Visual Identity','description_ar'=>'نصمم هوية بصرية متكاملة تعكس شخصية علامتكم التجارية — شعار، ألوان، خطوط، وإرشادات استخدام كاملة.','description_en'=>'We design a complete visual identity that reflects your brand personality — logo, colors, fonts, and full usage guidelines.','tag'=>'Logo · Branding · Style Guide','link'=>'visual-identity','order'=>1],
            ['icon'=>'📱','title_ar'=>'إدارة التواصل الاجتماعي','title_en'=>'Social Media Management','description_ar'=>'نُدير حساباتكم بإستراتيجية محكمة — تصميم احترافي، محتوى جذاب، وجدولة ذكية لتحقيق أقصى تفاعل.','description_en'=>'We manage your accounts with a solid strategy — professional design, engaging content, and smart scheduling.','tag'=>'Facebook · Instagram · TikTok','link'=>'social-media','order'=>2],
            ['icon'=>'💻','title_ar'=>'تصميم وتطوير المواقع','title_en'=>'Website Design & Development','description_ar'=>'نبني مواقع احترافية سريعة الاستجابة تحوّل الزوار إلى عملاء، من الواجهة حتى البرمجة الخلفية.','description_en'=>'We build professional responsive websites that convert visitors into clients.','tag'=>'WordPress · Laravel · React','link'=>'website-design','order'=>3],
            ['icon'=>'📸','title_ar'=>'تصوير المنتجات','title_en'=>'Product Photography','description_ar'=>'نلتقط صور منتجاتكم باحترافية تبرز جمالها وتفاصيلها — صور تبيع قبل أن يُكمل العميل قراءة الوصف.','description_en'=>'We professionally capture your products to highlight their beauty — photos that sell.','tag'=>'Product Photography · E-Commerce','link'=>'photography','order'=>4],
            ['icon'=>'🖨️','title_ar'=>'المطبوعات والجرافيكي','title_en'=>'Publications & Graphics','description_ar'=>'نصمم مطبوعاتكم بأعلى معايير الجودة — بروشورات، بطاقات أعمال، لافتات، وبوسترات احترافية.','description_en'=>'We design your prints to the highest quality standards — brochures, business cards, banners.','tag'=>'Print · Brochures · Banners','link'=>'publications','order'=>5],
            ['icon'=>'📊','title_ar'=>'الإعلانات الممولة','title_en'=>'Paid Advertising','description_ar'=>'نُدير حملاتكم على فيسبوك وإنستغرام وجوجل بكفاءة استراتيجية لضمان أقصى عائد على الاستثمار.','description_en'=>'We manage your campaigns on Facebook, Instagram, and Google for maximum ROI.','tag'=>'Meta Ads · Google Ads · Analytics','link'=>'contact','order'=>6],
        ];
        foreach ($services as $s) Service::create($s);

        // Portfolio
        $portfolio = [
            ['title_ar'=>'هوية بصرية — القاضي للبصريات','title_en'=>'Visual Identity — Al-Qadi Optics','subtitle_ar'=>'تصميم هوية متكاملة','subtitle_en'=>'Full Branding Design','category'=>'identity','image'=>'1.jpg','order'=>1],
            ['title_ar'=>'إدارة سوشيال ميديا','title_en'=>'Social Media Management','subtitle_ar'=>'تصميم منشورات احترافية','subtitle_en'=>'Professional Post Design','category'=>'social','image'=>'9.jpg','order'=>2],
            ['title_ar'=>'تصميم شعار احترافي','title_en'=>'Professional Logo Design','subtitle_ar'=>'هوية بصرية مميزة','subtitle_en'=>'Distinctive Visual Identity','category'=>'identity','image'=>'2.jpg','order'=>3],
            ['title_ar'=>'تصوير منتجات — Prodent','title_en'=>'Product Photography — Prodent','subtitle_ar'=>'تصوير احترافي بجودة عالية','subtitle_en'=>'High Quality Professional Shots','category'=>'photo','image'=>'prodent.png','order'=>4],
            ['title_ar'=>'تصميم محتوى بصري','title_en'=>'Visual Content Design','subtitle_ar'=>'محتوى بصري جذاب','subtitle_en'=>'Engaging Visual Content','category'=>'social','image'=>'10.jpg','order'=>5],
            ['title_ar'=>'هوية بصرية متكاملة','title_en'=>'Complete Visual Identity','subtitle_ar'=>'Branding احترافي','subtitle_en'=>'Professional Branding','category'=>'identity','image'=>'13.jpg','order'=>6],
            ['title_ar'=>'تصميم منشورات فيسبوك','title_en'=>'Facebook Post Design','subtitle_ar'=>'تصميم احترافي للمنشورات','subtitle_en'=>'Professional Social Posts','category'=>'social','image'=>'8.jpg','order'=>7],
        ];
        foreach ($portfolio as $p) PortfolioItem::create($p);

        // Clients
        $clients = [
            ['name_ar'=>'القاضي للبصريات','name_en'=>'Al-Qadi Optics','logo'=>'alqadi.png','order'=>1],
            ['name_ar'=>'حرير كلينك','name_en'=>'Harir Clinic','logo'=>'hrir.png','order'=>2],
            ['name_ar'=>'لاراتيكس','name_en'=>'Larateks','logo'=>'larateks.png','order'=>3],
        ];
        foreach ($clients as $c) Client::create($c);

        // Why Us
        $why = [
            ['icon'=>'🏆','title_ar'=>'خبرة تمتد لأكثر من 8 سنوات','title_en'=>'Over 8 Years of Experience','description_ar'=>'منذ 2016 ونحن نبني سمعتنا مشروعاً بعد مشروع. خبرتنا الميدانية تمنحنا رؤية لا يملكها كثيرون.','description_en'=>'Since 2016 we\'ve been building our reputation project by project.','order'=>1],
            ['icon'=>'🎯','title_ar'=>'نتائج قابلة للقياس','title_en'=>'Measurable Results','description_ar'=>'لا نعمل على "إبداع جميل" فحسب — نعمل على نتائج حقيقية بمؤشرات أداء واضحة نلتزم بتحقيقها.','description_en'=>'We don\'t just create "pretty designs" — we work on real results with clear KPIs.','order'=>2],
            ['icon'=>'🤝','title_ar'=>'دعم غير محدود','title_en'=>'Unlimited Support','description_ar'=>'علاقتنا بعملائنا لا تنتهي عند التسليم. نقدم دعماً مستمراً لضمان استمرار نجاحكم.','description_en'=>'Our relationship with clients doesn\'t end at delivery.','order'=>3],
            ['icon'=>'⚡','title_ar'=>'التزام بالمواعيد','title_en'=>'On-Time Delivery','description_ar'=>'نحترم وقتكم ونلتزم بالمواعيد. خطة واضحة في كل مشروع تضمن التسليم في الوقت المناسب.','description_en'=>'We respect your time and stick to deadlines.','order'=>4],
            ['icon'=>'💡','title_ar'=>'إبداع استراتيجي','title_en'=>'Strategic Creativity','description_ar'=>'الإبداع عندنا مبني على دراسة السوق وفهم الجمهور المستهدف وأهداف عملكم.','description_en'=>'Our creativity is built on market research and understanding your target audience.','order'=>5],
            ['icon'=>'💰','title_ar'=>'أسعار تنافسية','title_en'=>'Competitive Pricing','description_ar'=>'نقدم جودة عالمية بأسعار تناسب السوق المحلي. كل شيكل تستثمره يعود بأضعاف قيمته.','description_en'=>'We deliver world-class quality at prices that suit the local market.','order'=>6],
        ];
        foreach ($why as $w) WhyItem::create($w);
    }
}
