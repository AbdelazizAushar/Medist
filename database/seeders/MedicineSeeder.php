<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Medicine;
use App\Models\MedicineDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commercial_names = [
            // pain killers
            ['en' => "Paracetamol", 'ar' => 'باراسيتامول'], // Paracetamol
            ['en' => "Dam-Profen", 'ar' => 'دام بروفن'], // Prufen
            ['en' => "Diclopinda", 'ar' => 'ديكلوبيندا'], // ديكلوفيناك الصوديوم
            ['en' => "Excedrin", 'ar' => 'اكسدرين'], // Acetaminophen
            ['en' => "Tempra", 'ar' => 'تمبرا'], // Paracetamol
            ['en' => "Adrina Cough", 'ar' => 'ادرينا كوف'], // Paracetamol
            ['en' => "Bahri Flu", 'ar' => 'بحري فلو'], // Paracetamol
            ['en' => "Paracetamol Extra Bahri", 'ar' => 'باراسيتامول اكسترا بحري'], // Paracetamol
            ['en' => "Unadol", 'ar' => 'يونادول'], // Paracetamol
            ['en' => "Unadol Sinus", 'ar' => 'يونادول ساينس'], // Caffiene
            ['en' => "Unadol Extra", 'ar' => 'يونادول اكسترا'], // Paracetamol & Caffeine
            ['en' => "Unadol Joint", 'ar' => 'يونادول جوينت'], // Paracetamol
            ['en' => "Unadol Night", 'ar' => 'يونادول نايت'], // Paracetamol + Diphenhydramine Hydrochloride
            ['en' => "Unadol Cough", 'ar' => 'يونادول كف'], // Paracetamol &  Phenylephrine Hydrochloride & Guaifenesin
            ['en' => "Unadol ActiFast", 'ar' => 'يونادول أكتيفاست'], // Paracetamol
            ['en' => "Unadol Cold & Flu Night", 'ar' => 'يونادول كولد اند فلو نايت'], // Paracetamol + Phenylephrine Hydrochloride + Chlorpheniramine Maleate
            ['en' => "Unadol Cold & Flu Day", 'ar' => 'يونادول كولد اند فلو داي'], // Paracetamol + Caffeine + Phenylephrine Hydrocloride
            ['en' => "Unadol Forte", 'ar' => 'يونادول فورت'], // Paracetamol
            ['en' => "Unixedrin", 'ar' => 'يونكسدرين'], // Acetaminophen + Aspirin +Caffeine
            ['en' => "Antimigra", 'ar' => 'انتيميغرا'], // Zolmitriptan
            ['en' => "Paracetamol Barakat", 'ar' => 'الباراسيتامول بركات'], // Paracetamol
            ['en' => "Paracetamol Plus Barakat", 'ar' => 'الباراسيتامول بركات بلس'], // Paracetamol
            ['en' => "Tolidon Plus", 'ar' => 'توليدون بلس'], // paracetamol
            //antibiotics
            ['en' => "Zithropenda", 'ar' => 'زيثروبندا'], //أزيترومايسين
            ['en' => "Spiradent", 'ar' => 'سبيرادنت'], // سبيرامايسين
            ['en' => "Amoksiklav", 'ar' => 'أموكسيكلاف'], //Amoxicillin+ Clavulanic Acid
            ['en' => "Azitrax", 'ar' => 'أزيتراكس'], //Azithromycin .
            ['en' => "Batram", 'ar' => 'باترام'], //Sulfamethoxazole + Trimethoprim
            ['en' => "Clarithro", 'ar' => 'كلاريثرو'], //Clarithromycin .
            ['en' => "Oroci", 'ar' => 'أوروسي'], //Cefpodoxime
            ['en' => "Ciproxene", 'ar' => 'سيبروكسين'], //Ciprofloxacin
            ['en' => "Nitrobid M", 'ar' => 'نيتروبيد م'], //Nitrofurantoin
            ['en' => "Omitri", 'ar' => 'أوميتري'], //Cefdinir
            ['en' => "Cef", 'ar' => 'سف'], //Cefixime
            ['en' => "Klacid", 'ar' => 'كلاسيد'], //Clarithromycin
            ['en' => "Tendoxal", 'ar' => 'تندوكسال'], //Amoxicillin + Flucloxacillin
            ['en' => "Klacid MR", 'ar' => 'كلاسيد م ر'], //Clarithromycin
            ['en' => "Sostendo XR", 'ar' => 'سوستندو اكس ر'], //Ciprofloxacine
            ['en' => "Zithro", 'ar' => 'زيثرو'], //Azithromycin
            ['en' => "Tronidaze", 'ar' => 'ترونيداز'], //Metronidazole
            ['en' => "Augmatex", 'ar' => 'اوجماتكس'], //Amoxicillin + Clavulanic Acid
            ['en' => "Azocin", 'ar' => 'أزوسين'], //Azithromycin
            ['en' => "Ciplox", 'ar' => 'سيبلوكس'], //Ciprofloxacin
            ['en' => "Azoflox", 'ar' => 'أزوفلوكس'], //Ofloxacin
            ['en' => "DoubleNix", 'ar' => 'دبل نيكس'], //Metronidazole + Spiramycin
            ['en' => "DoubleNix Forte", 'ar' => 'دبل نيكس فورت'], //Metronidazole + Spiramycin
            ['en' => "Factizor", 'ar' => 'فاكتايزور'], //Gemifloxacin
            ['en' => "Fasigast", 'ar' => 'فاسيغاست'], //Tinidazole
            ['en' => "Gentazor", 'ar' => 'جنتازور'], //Gentamycin
            ['en' => "Lincomycin", 'ar' => 'لينكومايسين'], //Lincomycin
            ['en' => "Maxiflux", 'ar' => 'ماكسيفلوكس'], //Amoxicillin
            ['en' => "Rithro", 'ar' => 'ريثرو'], //Clarithromycin
            //nutritions
            ['en' => "Ultra MSM", 'ar' => 'الترا م س م'], //  ميتيل سولفونيل ميتان
            ['en' => "DamVita", 'ar' => 'دام فيتا'], // ڤيتامين ب1
            ['en' => "Calcidal", 'ar' => 'كالسيدال'], // كالسيوم
            ['en' => "Multi Flex", 'ar' => 'مالتي فلكس'], // روزا كانينا -ل
            ['en' => "Actinerve", 'ar' => 'اكتينرف'], // Vitamin B1 + Vitamin B6 +Vitamin B12
            ['en' => "B-Plus", 'ar' => 'بي بلاس'], //Vitamin B1 + Vitamin B2 + Vitamin B6
            ['en' => "Nebroget", 'ar' => 'نيو نبروجيت'], //Vitamin B1 + Vitamin B6 + Vitamin B12
            ['en' => "Vit-C", 'ar' => 'فيت سي'], // Vitamin C
            ['en' => "Sun-D3", 'ar' => 'سان د 3'], // كوليكالسيفيرول
            ['en' => "Foliron-12", 'ar' => 'فوليرون - 12'], // سيترات الحديد النشادرية + فيتامين ب12 + حمض الفوليك
            ['en' => "Peldinar", 'ar' => 'بلدينار'], //فيتامين أ + فيتامين ي
            ['en' => "Calcivit-C", 'ar' => 'كالسيفيت سي'], // Calcium + Vitamin C
            ['en' => "Baricomplex", 'ar' => 'باريكومبلكس'], //Vitamin B1
            ['en' => "Barkaneurin", 'ar' => 'باركانورين'], //Vitamin B1
            ['en' => "Barkavite", 'ar' => 'باركافيت'], //pyrimidine
            ['en' => "Vitabar Beauty", 'ar' => 'فيتابار بيوتي'], //Vitamin E
            ['en' => "Vitabar Diacare", 'ar' => 'فيتابار دياكير'], //Vitamin A
            ['en' => "Vitabar Maternity", 'ar' => 'فيتابار للأمومة'], //Vitamin D
            ['en' => "Vitabar Osteofort", 'ar' => 'فيتابار اوستيوفورت'], //Vitamin D
            ['en' => "Vitabar Vision", 'ar' => 'بلدينار فيجن'], //Betacarotene
            ['en' => "D-Vit", 'ar' => 'د-فيت'], //Vitamin D3
            ['en' => "Metra-B12", 'ar' => 'ميترا بي 12'], //Mecobalamine
            ['en' => "Neo-Vit", 'ar' => 'نيو فيت'], //Vitamin B1
            ['en' => "Survital Z", 'ar' => 'سيرفيتال ز'], //Iron
            ['en' => "Cintrex", 'ar' => 'سنتركس'], //Vit. A
            ['en' => "Cintrex Osteo", 'ar' => 'سنتركس اوستيو'], //Vitamin D
            ['en' => "Cintrex Pregnancy", 'ar' => 'سنتركس الحمل'], //Vit. D3
            ['en' => "Cintrex Vit.C", 'ar' => 'سنتركس فيتامين سي'], //Vitamin C
            ['en' => "Glucosamine Avenzor", 'ar' => 'الجلوكوزامين أفينزور'], //Glucosamine
            ['en' => "Hiflex", 'ar' => 'هيفليكس'], //Glucosamine Sulfat
            //cardio (ADD MORE)
            ['en' => "Amlodipine", 'ar' => 'أملودبين'], // أملودبين بيسيلات
            ['en' => "Blanicard", 'ar' => 'بلانيكارد'], // أولميسارتان ميدوكسوميل
            ['en' => "Bizocand", 'ar' => 'بيزوكاند'], //بيزوبرولول فومارات
            ['en' => "Tri-Pland", 'ar' => 'تري بلاند'], //أملودبين + فالسارتان + هيدروكلورثيازيد
            ['en' => "Restopril", 'ar' => 'ريستوبريل'], //راميبريل
            ['en' => "Rioxaban", 'ar' => 'ريوكسابان'], // ريفاروكسابان
            ['en' => "Sacoplus", 'ar' => 'ساكوبلس'], //معقد ساكوبتريل فالسارتان الصوديوم
            ['en' => "Spirdacton", 'ar' => 'سبيرداكتون'], //سبيرونولاكتون
            ['en' => "Valican-H", 'ar' => 'فاليكان'], //فالسارتان + هيدروكلورتيازيد
            ['en' => "Crandozix", 'ar' => 'كراندوزيكس'], //فوروسيميد
            ['en' => "Clandopril", 'ar' => 'كلاندوبريل'], //اينالابريل ماليات + هيدروكلوروتيازيد
            ['en' => "Londalop", 'ar' => 'لوندالوب'], // بيتافاستاتين كالسيوم
            ['en' => "Metabloc", 'ar' => 'ميتوبلوك'], //ميتوبرولول طرطرات
            ['en' => "Norkand", 'ar' => 'نوركاند'], //أملوديبين (مثل بيزيلات)+ بينازيبريل هيدروكلورايد
            ['en' => "Altiazem RR", 'ar' => 'التيازيم رر'], // Diltiazem resinate
            ['en' => "Aminur SR", 'ar' => 'أمينور س ر'], // Indapamide
            ['en' => "Capoten", 'ar' => 'كابوتين'], // Captopril
            ['en' => "Arni", 'ar' => 'أرني'], //sacubitril
            ['en' => "Torespot", 'ar' => 'توريسبوت'], //torsemide
            ['en' => "Tildia", 'ar' => 'تيلديا'], //Diltiazem
            ['en' => "Clopid", 'ar' => 'كلوبيد'], //Clopidogrel
            ['en' => "Conipan", 'ar' => 'كونيبان'], //Ivabradine
            ['en' => "Asclop", 'ar' => 'أسكلوب'], //Clopidogrel - Aspirin
            ['en' => "Dopamine ELSaad", 'ar' => 'دوبامين السعد'], //Dopamine
            ['en' => "Adizem", 'ar' => 'أديزيم'], // Diltiazem
            ['en' => "Carvidomet", 'ar' => 'كارفيدوميت'], // Trimetazidine
            ['en' => "Clobeden", 'ar' => 'كلوبيدن'], // clopidogrel
            ['en' => "Faderin", 'ar' => 'فادرين'], // Aspirin
            ['en' => "Hypovolol", 'ar' => 'هيبوفولول'], // Nebivolol
            ['en' => "Iso Dinitrat", 'ar' => 'ايزو دينترات'], // Isosorbide Dinitrate
            ['en' => "Mononitrat", 'ar' => 'مونونيترات'], // isosorbide mononitrate
            // intestinal
            ['en' => "Anasol-Proct", 'ar' => 'أنازول بروكت'], //هيدروكورتيزون أسيتات + بنزوات البنزيل + تحت غالات البزموت + أكسيد البزموت + بلسم البيرو + أوكسيد الزنك
            ['en' => "Eso-Protocol", 'ar' => 'إيزو-بروتوكول'], // إيزوميبرازول
            ['en' => "Ultraglycerol", 'ar' => 'التراغليسيرول'], //غليسيرين
            ['en' => "Damatil", 'ar' => 'دامتيل'], //سولبريد
            ['en' => "Dill Water", 'ar' => 'ديل ووتر'], //زيت الشبث + بيكربونات الصوديوم
            ['en' => "Spandoverin", 'ar' => 'سباندوفرين'], // آلفيرين سيترات
            ['en' => "Stomacol", 'ar' => 'ستوماكول'], //هيدروكسيد الألومنيوم المجففة جل + هيدروكسيد المغنيسيوم
            ['en' => "Flancogyl", 'ar' => 'فلانكوجيل'], //ميترونيدازول
            ['en' => "Cametron", 'ar' => 'كاميترون'], //اونداستيرون أساس
            ['en' => "Curanus", 'ar' => 'كورانوس'], // فلوسينولون أسيتونيد + ليدوكائين هيدروكلورايد
            ['en' => "Lopacon", 'ar' => 'لوباكون'], //لوبيراميد هيدروكلوريد+ سيميثيكون
            ['en' => "Colonium", 'ar' => 'الكولونيوم'], //otilonium bromide.
            ['en' => "Cerucal", 'ar' => 'سيروكال'], //metoclopramide
            ['en' => "Duspal", 'ar' => 'دوسبال'], //mebeverine hydrochloride.
            ['en' => "Esotom", 'ar' => 'ايسوتوم'], //Esomeprazole
            ['en' => "Mezym Forte", 'ar' => 'ميزيم فورت'], //Pancreatin
            ['en' => "Protcosedyl", 'ar' => 'بروكتوسيديل'], //Cinchocaine Hydrochloride BP
            ['en' => "Usigyn", 'ar' => 'أوسيجين'], // tinidazole
            ['en' => "Diafurl", 'ar' => 'ديافورل'], // Nifuroxazide
            ['en' => "Twizla", 'ar' => 'تويزلا'], // Telmisartan/Amlodipine
            ['en' => "Telmi", 'ar' => 'تيلمي'], // Telmisartan
            ['en' => "Telmi HCT", 'ar' => 'تيلمي اتش سي تي'], // TTelmisartan/Hydrochlorothiazide
            ['en' => "Qualival", 'ar' => 'كواليفال'], // Valsartan
            ['en' => "Corvos", 'ar' => 'كورفوس'], // Amlodipine/Valsartan
            ['en' => "Amlovazide", 'ar' => 'أملوفازيد'], // Amlodipine/Valsartan/Hydrochlorothiazide
            ['en' => "Aceonmond", 'ar' => 'أسونموند'], // Perindopril
            ['en' => "Aceonmond Plus", 'ar' => 'أسونموند بلس'], // Perindopril/Indapamide
            ['en' => "Evedes", 'ar' => 'ايفيديس'], // Perindopril/Amlodipine
            ['en' => "Amlormond", 'ar' => 'أملورموند'], // Amlodipine
            ['en' => "Lisoten", 'ar' => 'ليسوتين'], // Lisinopril
            ['en' => "Lotrilmond Fort", 'ar' => 'لوتريلموند فورت'], // Amlodipine/Benazepril
            ['en' => "Barcolan", 'ar' => 'باركولان'], // Paracetamol
            ['en' => "Barkabromide", 'ar' => 'باركابروميد'], // Metoclopramide hydrochloride
            ['en' => "Barkadin", 'ar' => 'بركادين'], // Ranitidine
            ['en' => "Barkalaxine", 'ar' => 'باركالاكسين'], // Bisacodyl
            ['en' => "Barkalox", 'ar' => 'باركالوكس'], // Aluminum Hydroxide
            ['en' => "Barkanidazol", 'ar' => 'باركانيدازول'], // Metronidazole
            ['en' => "Barkanidazol Forte", 'ar' => 'باركانيدازول فورت'], // Metronidazole
            ['en' => "Flacefuryl", 'ar' => 'فلاسفيوريل'], // Metronidazole
            ['en' => "Glycerin Barakat", 'ar' => 'جليسرين بركات'], // Glycerin
            ['en' => "Motabar", 'ar' => 'موتابار'], // Domperidone
            ['en' => "Pecta", 'ar' => 'بيكتا'], // Kaolin
            ['en' => "Picolaxine", 'ar' => 'بيكولاكسين'], // Sodium Picosulfate
            ['en' => "Pilorect", 'ar' => 'بيلوريكت'], // Lajjalu
            // muscles
            ['en' => "Orphipal", 'ar' => 'أورفيبال'], //الأسبرين + أورفينادرين سيترات + الكافيين
            ['en' => "Orphilexa", 'ar' => 'أورفيليكسا'], // أورفينادرين سيترات + وباراسيتامول
            ['en' => "Alendron 70", 'ar' => 'الندرون 70'], // الندرونيك أسيد
            ['en' => "Carisol", 'ar' => 'كاريزول'], //كاريزوبرودول
            ['en' => "Carisol Extra", 'ar' => 'كاريزول اكسترا'], //باراسيتامول + كاريزوبرودول
            ['en' => "Newgesal", 'ar' => 'نيوجيزال'], //ساليسيلات الميثيل + منثول + الفلفل + كافور
            ['en' => "Tracar", 'ar' => 'تراكار'], // Atracurium
            ['en' => "Cistracar", 'ar' => 'سيستراكار'], // Cisatracurium
            ['en' => "Skeltone", 'ar' => 'سكيلتون'], // Metaxalone
            ['en' => "Zomoland", 'ar' => 'زومولاند'], // Chlorzoxazone
            ['en' => "Flam-K", 'ar' => 'فلام ك'], // Diclofenac
            ['en' => "Monrolac", 'ar' => 'مونرولاك'], // Ketorolac
            ['en' => "Diafen mond", 'ar' => 'ديافين موند'], // Ibuprofen
            ['en' => "Feldimond", 'ar' => 'فيلدموند'], // Piroxicam
            ['en' => "Celico mond", 'ar' => 'سيليكو موند'], // Celecoxib
            ['en' => "Combigesic", 'ar' => 'فيلدموند'], // Orphenadrine Citrate
            ['en' => "Miorest", 'ar' => 'فيلدموند'], // Tizanidine
            ['en' => "Neostigmine", 'ar' => 'فيلدموند'], // Neostigmine methylsulfate
            // skin
            ['en' => "Bincure", 'ar' => 'بينكور'], //سلفاديازين الفضة + بانتينول
            ['en' => "Pino", 'ar' => 'بينو'], //بنزوئيل بيروكسيد
            ['en' => "Deslomar", 'ar' => 'ديسلومار'], //ديسلومار
            ['en' => "Difladerm", 'ar' => 'ديفلاديرم'], //أكسيد الزنك + ثاني أكسيد التيتانيوم
            ['en' => "Fusidam", 'ar' => 'فوسيدام'], //حمض الفوسيديك
            ['en' => "Adaclean", 'ar' => 'اداكلين'], // أدابالين/ بنزوئيل بيروكسيد
            ['en' => "Levonda", 'ar' => 'ليفوندا'], //ليفوسيتريزين ديهيدروكلوريد
            ['en' => "Nystacort", 'ar' => 'نيستاكورت'], // ديكساميثازون + الكلورهيكسيدين حمض الهيدروكلوريد + نيستاتين
            ['en' => "Tazarogel", 'ar' => 'تازاروجيل'], //Tazarotene
            ['en' => "Vanelmond", 'ar' => 'فانيلموند'], // Eflornithine
            ['en' => "Betaderm", 'ar' => 'بيتاديرم'], // Betamethasone 0.5 mg
            ['en' => "Fusidina", 'ar' => 'فيوسيدينا'], // Fusidic acid 20 mg.
            ['en' => "Hydroderm", 'ar' => 'هيدروديرم'], // Fluocinolone 0.01 g.
            ['en' => "Burn Heal", 'ar' => 'بيرن هيل'], // Silver sulfadiazine 10 mg
            ['en' => "Pant Heal", 'ar' => 'بانت هيل'], // Dexapanthenol 5 g.
            ['en' => "Clobetasol Bahri", 'ar' => 'كلوبيتاسول بحري'], // Clobetasol 0.5 mg.
            ['en' => "Cortacon", 'ar' => 'كورتاكون'], // Mometasone furoate 1 mg
            ['en' => "Barasynalar", 'ar' => 'باراسينالار'], // Neomycin sulfate
            ['en' => "Benzyl Benzoate Barakat", 'ar' => 'بنزيل بنزوات بركات'], //Benzyl Benzoate
            ['en' => "Nystaderm", 'ar' => 'نيستاديرم'], //Nystatin
            ['en' => "Scalpazon", 'ar' => 'سكالبازون'], //Betamethasone
            ['en' => "Tazalytic", 'ar' => 'تازاليتيك'], //Tazalytic
            // endocrine
            ['en' => "Diacol", 'ar' => 'دياكول'], //إيمباغليفلوزين
            ['en' => "Diacol Plus", 'ar' => 'دياكول بلس'], //إمباغليفلوزين+ ميتفورمين هيدروكلورايد
            ['en' => "Diacolin", 'ar' => 'دياكولين'], // إمباغليفلوزين + ليناغلبتين
            ['en' => "Slofag", 'ar' => 'سلوفاج'], //ميتفورمين هيدروكلورايد
            ['en' => "Gliptin", 'ar' => 'غلبتين'], //سيتاغلبتين
            ['en' => "Glyfree", 'ar' => 'غليفري'], //غليبيزيد
            ['en' => "Metagliptin", 'ar' => 'ميتاغليبتن'], //سيتاغلبتين + ميتفورمين هيدروكلورايد
            ['en' => "Metaformin", 'ar' => 'ميتفورمين'], //ميتفورمين هيدروكلورايد
            ['en' => "Caberzor", 'ar' => 'كابيرزور'], //Cabergoline
            ['en' => "Contraxin", 'ar' => 'كونتراكسين'], //Methimazole
            ['en' => "Danazol", 'ar' => 'دانازول'], //Danazol
            ['en' => "Dexamethasone Ampoule", 'ar' => 'أمبولات ديكساميثازون'], //Dexamethasone phosphate
            ['en' => "Dexamethasone Avenzor", 'ar' => 'ديكساميثازون أفينزور'], //Dexamethasone
            ['en' => "Dexamethasone Elixir", 'ar' => 'إكسير ديكساميثازون'], //Dexamethasone
            ['en' => "Eltroxin", 'ar' => 'التروكسين'], //Thyroxine sodium
            ['en' => "Lotus", 'ar' => 'لوتس'], //Drospirenone
            ['en' => "Norazor", 'ar' => 'نورازور'], //Norethisterone
            ['en' => "Incite", 'ar' => 'انسايت'], //Clomiphene citrate
            ['en' => "Procriptin", 'ar' => 'بروكريبتين'], //Bromocriptine
            ['en' => "Steropred", 'ar' => 'ستيروبريد'], //Prednisolone
            ['en' => "Sylla-35", 'ar' => 'سيلا-35'], //Cyproterone Acetate

        ];

        $scientific_names = [
            //pain killers
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Prufen", "ar" => "بروفين"],
            ["en" => "Diclofenac sodium", "ar" => "ديكلوفيناك الصوديوم"],
            ["en" => "Acetaminophen", "ar" => "أسِيتامينُوفين"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Caffiene", "ar" => "الكافيين"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Phenylephrine Hydrochloride", "ar" => "فينيليفرين هيدروكلوريد"],
            ["en" => "Caffeine", "ar" => "الكافيين"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Acetaminophen", "ar" => "أسِيتامينُوفين"],
            ["en" => "Zolmitriptan", "ar" => "زولميتريبتان"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            //antibiotics
            ["en" => "Azithromycin", "ar" => "أزيترومايسين"],
            ["en" => "Spiramycin", "ar" => "سبيرامايسين"],
            ["en" => "Amoxicillin", "ar" => "أموكسيسيلين"],
            ["en" => "Azithromycin", "ar" => "أزيثروميسين"],
            ["en" => "Sulfamethoxazole", "ar" => "سلفاميثوكسازول"],
            ["en" => "Clarithromycin", "ar" => "كلاريثروميسين"],
            ["en" => "Cefpodoxime", "ar" => "سيفبودوكسيم"],
            ["en" => "Ciprofloxacin", "ar" => "سيبروفلوكساسين"],
            ["en" => "Nitrofurantoin", "ar" => "نتروفورانتوين"],
            ["en" => "Cefdinir", "ar" => "سيفدينير"],
            ["en" => "Cefixime", "ar" => "سيفيكسيم"],
            ["en" => "Clarithromycin", "ar" => "كلاريثروميسين"],
            ["en" => "Flucloxacillin", "ar" => "فلوكلوكساسيلين"],
            ["en" => "Clarithromycin", "ar" => "كلاريثروميسين"],
            ["en" => "Ciprofloxacine", "ar" => "سيبروفلوكساسين"],
            ["en" => "Azithromycin", "ar" => "أزيثروميسين"],
            ["en" => "Metronidazole", "ar" => "ميترونيدازول"],
            ["en" => "Clavulanic Acid", "ar" => "حمض كلافولانك"],
            ["en" => "Azithromycin", "ar" => "أزيثروميسين"],
            ["en" => "Ciprofloxacin", "ar" => "سيبروفلوكساسين"],
            ["en" => "Ofloxacin", "ar" => "أوفلوكساسين"],
            ["en" => "Metronidazole", "ar" => "ميترونيدازول"],
            ["en" => "Spiramycin", "ar" => "سبيراميسين"],
            ["en" => "Gemifloxacin", "ar" => "جيميفلوكساسين"],
            ["en" => "Tinidazole", "ar" => "تينيدازول"],
            ["en" => "Gentamycin", "ar" => "الجنتاميسين"],
            ["en" => "Lincomycin", "ar" => "لينكومايسين"],
            ["en" => "Amoxicillin", "ar" => "أموكسيسيلين"],
            ["en" => "Clarithromycin", "ar" => "كلاريثروميسين"],
            // nutritients
            ["en" => "Methyl sulfonylmethane", "ar" => "ميتيل سولفونيل ميتان"],
            ["en" => "Vitamin B1", "ar" => "ڤيتامين ب1"],
            ["en" => "Calcium", "ar" => "كالسيوم"],
            ["en" => "Rosa canina -L", "ar" => "روزا كانينا -ل"],
            ["en" => "Vitamin B6", "ar" => "فيتامين ب6"],
            ["en" => "Vitamin B2", "ar" => "فيتامين ب2"],
            ["en" => "Vitamin B12", "ar" => "فيتامين ب12"],
            ["en" => "Vitamin C", "ar" => "فيتامين سي"],
            ["en" => "Cholecalciferol", "ar" => "كوليكالسيفيرول"],
            ["en" => "Ammonium iron citrate", "ar" => "سيترات الحديد النشادرية"],
            ["en" => "Vitamin A", "ar" => "فيتامين أ"],
            ["en" => "Calcium", "ar" => "كالسيوم"],
            ["en" => "Vitamin B1", "ar" => "ڤيتامين ب1"],
            ["en" => "Vitamin B1", "ar" => "ڤيتامين ب1"],
            ["en" => "Pyrimidine", "ar" => "بيريميدين"],
            ["en" => "Vitamin E", "ar" => "فيتامين ه"],
            ["en" => "Vitamin A", "ar" => "فيتامين أ"],
            ["en" => "Vitamin D", "ar" => "فيتامين د"],
            ["en" => "Vitamin D", "ar" => "فيتامين د"],
            ["en" => "Betacarotene", "ar" => "بيتاكاروتين"],
            ["en" => "Vitamin D3", "ar" => "فيتامين د3"],
            ["en" => "Mecobalamine", "ar" => "ميكوبالامين"],
            ["en" => "Vitamin B1", "ar" => "فيتامين ب1"],
            ["en" => "Iron", "ar" => "حديد"],
            ["en" => "Vitamin A", "ar" => "فيتامين أ"],
            ["en" => "Vitamin D", "ar" => "فيتامين د"],
            ["en" => "Vitamin D3", "ar" => "فيتامين د3"],
            ["en" => "Vitamin C", "ar" => "فيتامين سي"],
            ["en" => "Glucosamine", "ar" => "الجلوكوزامين"],
            ["en" => "Glucosamine Sulfat", "ar" => "كبريتات الجلوكوزامين"],
            //cardio
            ["en" => "Amlodipine Besylate", "ar" => "أملودبين بيسيلات"],
            ["en" => "Olmesartan Medoxomil", "ar" => "أولميسارتان ميدوكسوميل"],
            ["en" => "Bisoprolol Fumarate", "ar" => "بيزوبرولول فومارات"],
            ["en" => "Amlodipine", "ar" => "أملودبين"],
            ["en" => "Ramipril", "ar" => "راميبريل"],
            ["en" => "Rivaroxaban", "ar" => "ريفاروكسابان"],
            ["en" => "Sacubitril valsartan sodium complex", "ar" => "معقد ساكوبتريل فالسارتان الصوديوم"],
            ["en" => "Spironolactone", "ar" => "سبيرونولاكتون"],
            ["en" => "Valsartan", "ar" => "فالسارتان"],
            ["en" => "Furosemide", "ar" => "فوروسيميد"],
            ["en" => "Enalapril Maleate", "ar" => "اينالابريل ماليات"],
            ["en" => "Pitavastatin Calcium", "ar" => "بيتافاستاتين كالسيوم"],
            ["en" => "Metoprolol Tartrate", "ar" => "ميتوبرولول طرطرات"],
            ["en" => "Amlodipine", "ar" => "أملوديبين"],
            ["en" => "Diltiazem resinate", "ar" => "راتنجات الديلتيازيم"],
            ["en" => "Indapamide", "ar" => "إنداباميد"],
            ["en" => "Captopril", "ar" => "كابتوبريل"],
            ["en" => "Sacubitril", "ar" => "ساكوبيتريل"],
            ["en" => "Torsemide", "ar" => "تورسيميد"],
            ["en" => "Diltiazem", "ar" => "ديلتيازيم"],
            ["en" => "Clopidogrel", "ar" => "كلوبيدوقرل"],
            ["en" => "Ivabradine", "ar" => "إيفابرادين"],
            ["en" => "Clopidogrel", "ar" => "كلوبيدوقرل"],
            ["en" => "Dopamine", "ar" => "الدوبامين"],
            ["en" => "Diltiazem", "ar" => "ديلتيازيم"],
            ["en" => "Trimetazidine", "ar" => "تريميتازيدين"],
            ["en" => "Clopidogrel", "ar" => "كلوبيدوقرل"],
            ["en" => "Aspirin", "ar" => "أسبرين"],
            ["en" => "Nebivolol", "ar" => "نيبيفولول"],
            ["en" => "Isosorbide Dinitrate", "ar" => "إيزوسوربيد ثنائي النترات"],
            ["en" => "Isosorbide Mononitrate", "ar" => "إيزوسوربيد مونونيترات"],
            //intestinal
            ["en" => "Hydrocortisone acetate", "ar" => "هيدروكورتيزون أسيتات"],
            ["en" => "Esomeprazole", "ar" => "إيزوميبرازول"],
            ["en" => "Glycerine", "ar" => "غليسيرين"],
            ["en" => "Solpride", "ar" => "سولبريد"],
            ["en" => "Dill oil", "ar" => "زيت الشبث"],
            ["en" => "Alverine Citrate", "ar" => "آلفيرين سيترات"],
            ["en" => "Magnesium Hydroxide", "ar" => "هيدروكسيد المغنيسيوم"],
            ["en" => "Metronidazole", "ar" => "ميترونيدازول"],
            ["en" => "Ondasterone Based", "ar" => "اونداستيرون أساس"],
            ["en" => "Fluocinolone Acetonide", "ar" => "فلوسينولون أسيتونيد"],
            ["en" => "Simethicone", "ar" => "سيميثيكون"],
            ["en" => "Otilonium Bromide", "ar" => "بروميد الاوتيلونيوم"],
            ["en" => "Metoclopramide", "ar" => "ميتوكلوبراميد"],
            ["en" => "Mebeverine Hydrochloride", "ar" => "ميبيفيرين هيدروكلوريد"],
            ["en" => "Esomeprazole", "ar" => "إيزوميبرازول"],
            ["en" => "Pancreatin", "ar" => "البنكرياس"],
            ["en" => "Cinchocaine Hydrochloride BP", "ar" => "سينكوكايين هيدروكلوريد BP"],
            ["en" => "Tinidazole", "ar" => "تينيدازول"],
            ["en" => "Nifuroxazide", "ar" => "نيفوروكسازيد"],
            ["en" => "Amlodipine", "ar" => "أملوديبين"],
            ["en" => "Telmisartan", "ar" => "تيلميسارتان"],
            ["en" => "Hydrochlorothiazide", "ar" => "هيدروكلوروثيازيد"],
            ["en" => "Valsartan", "ar" => "فالسارتان"],
            ["en" => "Valsartan", "ar" => "فالسارتان"],
            ["en" => "Amlodipine", "ar" => "أملوديبين"],
            ["en" => "Perindopril", "ar" => "بيريندوبريل"],
            ["en" => "Indapamide", "ar" => "إنداباميد"],
            ["en" => "Amlodipine", "ar" => "أملوديبين"],
            ["en" => "Amlodipine", "ar" => "أملوديبين"],
            ["en" => "Lisinopril", "ar" => "ليزينوبريل"],
            ["en" => "Amlodipine", "ar" => "أملوديبين"],
            ["en" => "Paracetamol", "ar" => "الباراسيتامول"],
            ["en" => "Metoclopramide Hydrochloride", "ar" => "ميتوكلوبراميد هيدروكلوريد"],
            ["en" => "Ranitidine", "ar" => "رانيتيدين"],
            ["en" => "Bisacodyl", "ar" => "بيساكوديل"],
            ["en" => "Aluminum Hydroxide", "ar" => "هيدروكسيد الألومنيوم"],
            ["en" => "Metronidazole", "ar" => "ميترونيدازول"],
            ["en" => "Metronidazole", "ar" => "ميترونيدازول"],
            ["en" => "Metronidazole", "ar" => "ميترونيدازول"],
            ["en" => "Glycerin", "ar" => "جلسيرين"],
            ["en" => "Domperidone", "ar" => "دومبيريدون"],
            ["en" => "Kaolin", "ar" => "الكاولين"],
            ["en" => "Sodium Picosulfate", "ar" => "بيكوسلفات الصوديوم"],
            ["en" => "Lajjalu", "ar" => "لاجالو"],
            //muscles
            ["en" => "Aspirin", "ar" => "الأسبرين"],
            ["en" => "Orphenadrine Citrate", "ar" => "أورفينادرين سيترات"],
            ["en" => "Alendronic Acid", "ar" => "الندرونيك أسيد"],
            ["en" => "Carisoprodol", "ar" => "كاريزوبرودول"],
            ["en" => "Paracetamol", "ar" => "باراسيتامول"],
            ["en" => "Methyl salicylate", "ar" => "ساليسيلات الميثيل "],
            ["en" => "Atracurium", "ar" => "أتراكوريوم"],
            ["en" => "Cisatracurium", "ar" => "سيساتراكوريوم"],
            ["en" => "Metaxalone", "ar" => "ميتاكسالون"],
            ["en" => "Chlorzoxazone", "ar" => "كلورزوكسازون"],
            ["en" => "Diclofenac", "ar" => "ديكلوفيناك"],
            ["en" => "Ketorolac", "ar" => "كيتورولاك"],
            ["en" => "Ibuprofen", "ar" => "ايبوبروفين"],
            ["en" => "Piroxicam", "ar" => "بيروكسيكام"],
            ["en" => "Celecoxib", "ar" => "سيليكوكسيب"],
            ["en" => "Orphenadrine Citrate", "ar" => "سيترات أورفينادرين"],
            ["en" => "Tizanidine", "ar" => "تيزانيدين"],
            ["en" => "Neostigmine Methylsulfate", "ar" => "نيوستيجمين ميثيل سلفات"],
            // skin
            ["en" => "Panthenol", "ar" => "بانتينول"],
            ["en" => "Benzoyl peroxide", "ar" => "بنزوئيل بيروكسيد"],
            ["en" => "Deslomar", "ar" => "ديسلومار"],
            ["en" => "Titanium dioxide", "ar" => "ثاني أكسيد التيتانيوم"],
            ["en" => "Fusidic acid", "ar" => "حمض الفوسيديك"],
            ["en" => "Adapalene", "ar" => "أدابالين"],
            ["en" => "Levocetirizine dihydrochloride", "ar" => "ليفوسيتريزين ديهيدروكلوريد"],
            ["en" => "Dexamethasone", "ar" => "ديكساميثازون"],
            ["en" => "Tazarotene", "ar" => "تازاروتين"],
            ["en" => "Eflornithine", "ar" => "إيفلورنيثين"],
            ["en" => "Betamethasone", "ar" => "بيتاميثازون"],
            ["en" => "Fusidic acid ", "ar" => "حمض الفوسيديك"],
            ["en" => "Fluocinolone", "ar" => "فلوسينولون"],
            ["en" => "Silver sulfadiazine", "ar" => "سلفاديازين الفضة"],
            ["en" => "Dexapanthenol", "ar" => "ديكسبانثينول"],
            ["en" => "Clobetasol", "ar" => "كلوبيتاسول"],
            ["en" => "Mometasone furoate", "ar" => "موميتازون فروات"],
            ["en" => "Neomycin sulfate", "ar" => "نيومايسين سلفات"],
            ["en" => "Benzyl Benzoate", "ar" => "بنزوات البنزيل"],
            ["en" => "Nystatin", "ar" => "نيستاتين"],
            ["en" => "Betamethasone", "ar" => "بيتاميثازون"],
            ["en" => "Tazalytic", "ar" => "تازاليتيك"],
            //endocrine
            ["en" => "Empagliflozin", "ar" => "إيمباغليفلوزين"],
            ["en" => "Empagliflozin", "ar" => "إيمباغليفلوزين"],
            ["en" => "Empagliflozin", "ar" => "إيمباغليفلوزين"],
            ["en" => "Metformin hydrochloride", "ar" => "ميتفورمين هيدروكلورايد"],
            ["en" => "Sitagliptin", "ar" => "سيتاغلبتين"],
            ["en" => "Glipizide", "ar" => "غليبيزيد"],
            ["en" => "Metformin hydrochloride", "ar" => "ميتفورمين هيدروكلورايد"],
            ["en" => "Metformin hydrochloride", "ar" => "ميتفورمين هيدروكلورايد"],
            ["en" => "Cabergoline", "ar" => "كابيرجولين"],
            ["en" => "Methimazole", "ar" => "ميثيمازول"],
            ["en" => "Danazol", "ar" => "دانازول"],
            ["en" => "Dexamethasone phosphate", "ar" => "ديكساميثازون فوسفات"],
            ["en" => "Dexamethasone", "ar" => "ديكساميثازون"],
            ["en" => "Dexamethasone", "ar" => "ديكساميثازون"],
            ["en" => "Thyroxine sodium", "ar" => "ثيروكسين الصوديوم"],
            ["en" => "Drospirenone", "ar" => "دروسبيرينون"],
            ["en" => "Norethisterone", "ar" => "نوريثيستيرون"],
            ["en" => "Clomiphene Citrate", "ar" => "سيترات كلوميفين"],
            ["en" => "Bromocriptine", "ar" => "بروموكريبتين"],
            ["en" => "Prednisolone", "ar" => "بريدنيزولون"],
            ["en" => "Cyproterone Acetate", "ar" => "خلات سيبروتيرون"],
        ];

        $categoies = [
            'Pain Killers', 'Antibiotics', 'Food Supplements', 'Cardiovascular Medications',
            'Intestinal Medications', 'Musculoskeletal Medications', 'Dermatology Medications', 'Endocrine Medications'
        ];

        $painKillers = [
            ["en" => "A nonsteroidal anti-inflammatory drug (NSAID) commonly used to relieve pain, reduce inflammation, and lower fever. It works by reducing the production of prostaglandins, chemicals that cause inflammation, pain, and fever in the body.", "ar" => "دواء مضاد للالتهابات غير الستيرويدية (NSAID) يستخدم عادة لتخفيف الألم وتقليل الالتهاب وخفض الحمى. وهو يعمل عن طريق تقليل إنتاج البروستاجلاندين، والمواد الكيميائية التي تسبب الالتهابات والألم والحمى في الجسم."],
            ["en" => "Used to relieve pain from various conditions such as headache, dental pain, menstrual cramps, muscle aches, or arthritis. It is also used to reduce fever and to relieve minor aches and pain due to the common cold or flu.", "ar" => "يستخدم لتخفيف الألم الناتج عن حالات مختلفة مثل الصداع، وآلام الأسنان، وتشنجات الدورة الشهرية، وآلام العضلات، أو التهاب المفاصل. كما أنه يستخدم لتقليل الحمى وتخفيف الآلام البسيطة الناتجة عن نزلات البرد أو الأنفلونزا."],
            ["en" => "A common over-the-counter medication used to alleviate pain and reduce fever. It’s considered a safe and effective analgesic and antipyretic.", "ar" => "دواء شائع بدون وصفة طبية يستخدم لتخفيف الألم وخفض الحمى. يعتبر مسكناً آمناً وفعالاً وخافضاً للحرارة."],
            ["en" => "A nonsteroidal anti-inflammatory drug (NSAID) that works by reducing hormones that cause inflammation and pain in the body.", "ar" => "دواء مضاد للالتهابات غير الستيرويدية (NSAID) يعمل عن طريق تقليل الهرمونات التي تسبب الالتهاب والألم في الجسم."],
            ["en" => "Used to reduce fever and treat pain or inflammation caused by many conditions such as headache, toothache, back pain, arthritis, or minor injury.", "ar" => "يستخدم لتقليل الحمى وعلاج الألم أو الالتهاب الناجم عن العديد من الحالات مثل الصداع أو ألم الأسنان أو آلام الظهر أو التهاب المفاصل أو الإصابة البسيطة."],
            ["en" => "An opioid medication that can help relieve pain", "ar" => "دواء أفيوني يمكن أن يساعد في تخفيف الألم"],
            ["en" => "A potent pain-relieving medicine that should be reserved for mainly cancer-related pain", "ar" => "دواء قوي لتخفيف الألم ويجب أن يقتصر على الألم المرتبط بالسرطان بشكل رئيسي"],
            ["en" => "A strong pain medication used to treat moderate to severe pain that is not being relieved by other types of pain medicines", "ar" => "مسكن قوي للألم يستخدم لعلاج الألم المتوسط إلى الشديد الذي لا يمكن تخفيفه بواسطة أنواع أخرى من أدوية الألم"]
        ];
        $foodSupplements = [
            ["en" => "Essential for vision, keeps tissues and skin healthy, and plays an important role in bone growth and in the immune system", "ar" => "ضروري للرؤية، ويحافظ على صحة الأنسجة والجلد، ويلعب دوراً مهماً في نمو العظام وفي جهاز المناعة"],
            ["en" => "Helps convert food into energy. It’s needed for healthy skin, hair, muscles, and brain and is critical for nerve function", "ar" => "يساعد على تحويل الغذاء إلى طاقة. إنه ضروري لصحة الجلد والشعر والعضلات والدماغ وهو مهم لوظيفة الأعصاب"],
            ["en" => "Essential for the growth and development of bones and teeth. It may also provide improved resistance to certain diseases", "ar" => "ضروري لنمو وتطور العظام والأسنان. وقد يوفر أيضًا مقاومة محسنة لبعض الأمراض"],
            ["en" => "Fight disease, reduce the risk of multiple sclerosis (MS), decrease the chance of heart disease, reduce the likelihood of severe illnesses, and support immune health1.", "ar" => "مكافحة الأمراض، وتقليل خطر الإصابة بمرض التصلب المتعدد (MS)، وتقليل فرصة الإصابة بأمراض القلب، وتقليل احتمالية الإصابة بأمراض خطيرة، ودعم صحة المناعة."],
            ["en" => "Might play an important role in regulating mood and decreasing the risk of depression. It might support weight loss.", "ar" => "قد يلعب دوراً مهماً في تنظيم المزاج وتقليل خطر الإصابة بالاكتئاب. قد يدعم فقدان الوزن."],
            ["en" => "It’s involved in building healthy bones and helps your blood clot so injuries can heal, and is essential in supporting blood clotting.", "ar" => "فهو يشارك في بناء عظام صحية ويساعد على تجلط الدم حتى يمكن شفاء الإصابات، وهو ضروري لدعم تخثر الدم."]
        ];
        $antiBiotics = [
            ["en" => "Used in the treatment of throat infections, meningitis, syphilis, and various other infections.", "ar" => "يستخدم في علاج التهابات الحلق، والتهاب السحايا، والزهري، والعديد من الالتهابات الأخرى."],
            ["en" => "Used to treat gonorrhea, pelvic inflammatory disease, and sinusitis, it also treats urinary tract infections (UTIs), epididymo-orchitis, and cellulitis.", "ar" => "يستخدم لعلاج السيلان ومرض التهاب الحوض والتهاب الجيوب الأنفية، كما أنه يعالج التهابات المسالك البولية (UTIs) والتهاب البربخ والخصية والتهاب النسيج الخلوي."],
            ["en" => "Used to treat several bacterial infections. It commonly treats chest, urethral, and pelvic infections, It also treats inflammatory skin conditions, such as acne, rosacea, and perioral dermatitis.", "ar" => "يستخدم لعلاج العديد من الالتهابات البكتيرية. يعالج عادة التهابات الصدر والإحليل والحوض، كما يعالج الأمراض الجلدية الالتهابية، مثل حب الشباب والوردية والتهاب الجلد حول الفم."],
            ["en" => "Used to treat bacterial infections, especially those caused by gram-positive organisms and enterococcal infections, which are resistant to other antibiotics.", "ar" => "يستخدم لعلاج الالتهابات البكتيرية، وخاصة تلك التي تسببها الكائنات الحية الدقيقة إيجابية الجرام والتهابات المكورات المعوية، والتي تكون مقاومة للمضادات الحيوية الأخرى."],
            ["en" => "Used to treat infections caused by gram-negative aerobic bacilli.", "ar" => "يستخدم لعلاج الالتهابات التي تسببها العصيات الهوائية سلبية الغرام."],
            ["en" => "Used to treat serious, invasive infections caused by gram-positive bacteria, including methicillin-resistant Staphylococcus aureus (MRSA).", "ar" => "يستخدم لعلاج حالات العدوى الخطيرة والغزوية التي تسببها البكتيريا إيجابية الجرام، بما في ذلك المكورات العنقودية الذهبية المقاومة للميثيسيلين (MRSA)."],
            ["en" => "Used to treat certain types of skin infections and pneumonia. They can also be used to treat infections caused by Enterococcus bacteria.", "ar" => "يستخدم لعلاج أنواع معينة من الالتهابات الجلدية والالتهاب الرئوي. ويمكن استخدامها أيضًا لعلاج الالتهابات التي تسببها بكتيريا المكورات المعوية."],
            ["en" => "Used to treat urinary tract infections (UTIs), bronchitis, eye infections, bacterial meningitis, and pneumonia.", "ar" => "يستخدم لعلاج التهابات المسالك البولية (UTIs)، والتهاب الشعب الهوائية، والتهابات العين، والتهاب السحايا الجرثومي، والالتهاب الرئوي."],
            ["en" => "Used to treat certain skin infections (e.g., impetigo). It is an antibiotic that works by stopping the growth of certain bacteria.", "ar" => "يستخدم لعلاج بعض الالتهابات الجلدية (مثل القوباء). وهو مضاد حيوي يعمل عن طريق وقف نمو بعض البكتيريا."],
            ["en" => "Used to treat a wide variety of bacterial infections. It is an antibiotic that works by stopping the growth of bacteria.", "ar" => "يستخدم لعلاج مجموعة واسعة من الالتهابات البكتيرية. وهو مضاد حيوي يعمل عن طريق وقف نمو البكتيريا."]
        ];
        $cardiovascular = [
            ["en" => "Used to reduce the heart rate, the heart’s workload and the heart’s output of blood, which lowers blood pressure, often used to treat conditions such as high blood pressure, angina, and irregular heart rhythms", "ar" => "يستخدم لتقليل معدل ضربات القلب وعبء عمل القلب وإخراج الدم من القلب، مما يخفض ضغط الدم، وغالبًا ما يستخدم لعلاج حالات مثل ارتفاع ضغط الدم والذبحة الصدرية وعدم انتظام ضربات القلب"],
            ["en" => "Used to block the action of an enzyme that produces a substance that constricts blood vessels. This allows blood vessels to relax and widen, reducing blood pressure", "ar" => "يستخدم لمنع عمل الإنزيم الذي ينتج مادة تضيق الأوعية الدموية. وهذا يسمح للأوعية الدموية بالاسترخاء والتوسع، مما يقلل من ضغط الدم"],
            ["en" => "Used to block the action of angiotensin II, a chemical that can constrict blood vessels. By blocking this chemical, ARBs allow blood vessels to stay open and relaxed", "ar" => "يستخدم لمنع عمل الأنجيوتنسين II، وهي مادة كيميائية يمكن أن تضيق الأوعية الدموية. من خلال منع هذه المادة الكيميائية، تسمح حاصرات مستقبلات الأنجيوتنسين للأوعية الدموية بالبقاء مفتوحة ومرتاحة"],
            ["en" => "Used to prevent calcium from entering the cells of the heart and blood vessels. This leads to less forceful heartbeats and a lower heart rate, which helps lower blood pressure", "ar" => "يستخدم لمنع دخول الكالسيوم إلى خلايا القلب والأوعية الدموية. وهذا يؤدي إلى ضربات قلب أقل قوة وانخفاض معدل ضربات القلب، مما يساعد على خفض ضغط الدم"],
            ["en" => "Used to prevent blood clots from forming by stopping blood platelets from sticking together.", "ar" => "يستخدم لمنع تكون جلطات الدم عن طريق منع الصفائح الدموية من الالتصاق ببعضها البعض."],
            ["en" => "Used to reduce the ability of the blood to clot, which can help prevent heart attacks and strokes", "ar" => "يستخدم لتقليل قدرة الدم على التجلط، مما يمكن أن يساعد في منع النوبات القلبية والسكتات الدماغية"],
            ["en" => "Used to relax the muscles in the walls of blood vessels, especially the arteries, allowing the vessels to dilate (widen), used to treat conditions such as high blood pressure, angina, and heart failure", "ar" => "يستخدم لاسترخاء العضلات الموجودة في جدران الأوعية الدموية، وخاصة الشرايين، مما يسمح للأوعية بالتمدد (الاتساع)، ويستخدم لعلاج حالات مثل ارتفاع ضغط الدم، والذبحة الصدرية، وفشل القلب."]
        ];
        $intestinal = [
            ["en" => "Used to treat inflammatory bowel disease and some forms of arthritis. They work by inhibiting the production of cyclo-oxygenase and prostaglandin, thromboxane synthetase, platelet activating factor synthetase, and interleukin-1 by macrophages so reduces the acute inflammatory response in inflammatory bowel disease.", "ar" => "يستخدم لعلاج مرض التهاب الأمعاء وبعض أشكال التهاب المفاصل. وهي تعمل عن طريق تثبيط إنتاج سيكلو أوكسيجيناز والبروستاجلاندين، وصناعة الثرومبوكسان، وسينثيتيز عامل تنشيط الصفائح الدموية، والإنترلوكين -1 بواسطة البلاعم، مما يقلل من الاستجابة الالتهابية الحادة في مرض التهاب الأمعاء."],
            ["en" => "Used to relieve the symptoms of gastroesophageal reflux disease (GERD, also known as acid reflux), heartburn or indigestion (also called dyspepsia). By neutralizing stomach acid, antacids relieve symptoms such as burning behind the breast bone or throat area (esophagus) caused by acid reflux, a bitter taste in the mouth, a persistent dry cough, pain when lying down, or regurgitation.", "ar" => "يستخدم لتخفيف أعراض مرض الجزر المعدي المريئي (المعروف أيضًا باسم ارتجاع الحمض) أو حرقة المعدة أو عسر الهضم. من خلال تحييد حمض المعدة، تعمل مضادات الحموضة على تخفيف الأعراض مثل الشعور بالحرقان خلف عظمة الصدر أو منطقة الحلق (المريء) الناجم عن ارتجاع الحمض، أو الطعم المر في الفم، أو السعال الجاف المستمر، أو الألم عند الاستلقاء، أو القلس."],
            ["en" => "Used to dissolve small non-calcified gallstones. They suppress the amount of cholesterol synthesized by the liver or inhibit the amount of cholesterol absorbed from the intestines.", "ar" => "يستخدم في إذابة حصوات المرارة الصغيرة غير المتكلسة. إنها تثبط كمية الكوليسترول التي يصنعها الكبد أو تمنع كمية الكوليسترول الممتصة من الأمعاء."],
            ["en" => "Used to increase motility of the gastrointestinal smooth muscle, without acting as a purgative. These drugs have different mechanisms of action but they all work to move the contents of the gastrointestinal tract faster.", "ar" => "يستخدم لزيادة حركة العضلات الملساء في الجهاز الهضمي، دون أن يعمل كمسهل. ولهذه الأدوية آليات عمل مختلفة ولكنها جميعها تعمل على تحريك محتويات القناة الهضمية بشكل أسرع."]
        ];
        $musculoskeletal = [
            ["en" => "Used in addition to rest and physical therapy to help relieve muscle spasms.", "ar" => "يستخدم بالإضافة إلى الراحة والعلاج الطبيعي للمساعدة في تخفيف التشنجات العضلية."],
            ["en" => "Used to treat muscle spasticity.", "ar" => "يستخدم في علاج التشنج العضلي"],
            ["en" => "A skeletal muscle relaxer used to relieve spasticity caused by MS.", "ar" => "مرخي للعضلات الهيكلية يستخدم لتخفيف التشنج الناتج عن مرض التصلب العصبي المتعدد"],
            ["en" => "A skeletal muscle relaxer used to treat muscle spasms caused by spinal cord injury, stroke, cerebral palsy, or MS. It works by acting directly on the skeletal muscle to relax the muscle spasm.", "ar" => "مرخي للعضلات الهيكلية يستخدم لعلاج التشنجات العضلية الناتجة عن إصابة الحبل الشوكي أو السكتة الدماغية أو الشلل الدماغي أو مرض التصلب العصبي المتعدد. وهو يعمل عن طريق العمل مباشرة على العضلات الهيكلية لتخفيف تشنج العضلات"],
            ["en" => "Used to relieve muscle spasms caused by inflammation, trauma, or muscle spasticity.", "ar" => "يستخدم لتخفيف التشنجات العضلية الناتجة عن الالتهاب أو الصدمات أو تشنج العضلات."],
            ["en" => "Used to help relax muscles.", "ar" => "يستخدم للمساعدة على استرخاء العضلات"],
            ["en" => "Used to to relieve seizures.", "ar" => "يستخدم للتخفيف من نوبات الصرع"]
        ];
        $dermatology = [
            ["en" => "Used because it can be irritating and can stain, helps reduce inflammation and can help treat psoriasis.", "ar" => "يُستخدم لأنه يمكن أن يكون مهيجًا ويمكن أن يسبب بقعًا، ويساعد في تقليل الالتهاب ويمكن أن يساعد في علاج الصدفية."],
            ["en" => "Used to treat skin conditions such as ringworm and athlete's foot.", "ar" => "يستخدم لعلاج الأمراض الجلدية مثل السعفة والقدم الرياضي."],
            ["en" => "Used to treat acne, Stop using this medication if you notice severe side effects like: Swelling in the area you use the medication, and blisters on your skin", "ar" => "يستخدم لعلاج حب الشباب، توقف عن استخدام هذا الدواء إذا لاحظت آثارًا جانبية شديدة مثل: تورم في المنطقة التي تستخدم فيها الدواء، وبثور على جلدك."],
            ["en" => "Used to treat skin conditions including eczema, Some possible common side effects of corticosteroids include burning or stinging in the area where you applied the medication.", "ar" => "يستخدم لعلاج الأمراض الجلدية بما في ذلك الأكزيما، وتشمل بعض الآثار الجانبية الشائعة المحتملة للكورتيكوستيرويدات الشعور بالحرقان أو اللسع في المنطقة التي قمت بتطبيق الدواء فيها."],
            ["en" => "Used for skin conditions including those related to herpes and shingles.", "ar" => "يستخدم لعلاج الأمراض الجلدية بما في ذلك تلك المتعلقة بالهربس والقوباء المنطقية."],
            ["en" => "Used to treat skin conditions linked to autoimmune diseases including vasculitis and inflammatory diseases such as eczema.", "ar" => "يستخدم لعلاج الأمراض الجلدية المرتبطة بأمراض المناعة الذاتية بما في ذلك التهاب الأوعية الدموية والأمراض الالتهابية مثل الأكزيما."],
            ["en" => "Used to treat conditions including severe cases of psoriasis and eczema.", "ar" => "يستخدم لعلاج الحالات بما في ذلك الحالات الشديدة من الصدفية والأكزيما."],
            ["en" => "Used to treat all types of severe psoriasis. It reduces skin cell growth.", "ar" => "يستخدم لعلاج جميع أنواع الصدفية الشديدة. يعمل على تقليل نمو خلايا الجلد."]
        ];
        $endocrine = [
            ["en" => "Used for glycemic control.", "ar" => "يستخدم للتحكم في نسبة السكر في الدم."],
            ["en" => "Used for treatment of type II diabetes mellitus.", "ar" => "يستخدم في علاج مرض السكري من النوع الثاني."],
            ["en" => "Used to increase insulin secretion by stimulating pancreatic beta cells. Beta cells may become sensitized to these medications over time, eventually resulting in failure.", "ar" => "يستخدم لزيادة إفراز الأنسولين عن طريق تحفيز خلايا بيتا في البنكرياس. قد تصبح خلايا بيتا حساسة لهذه الأدوية بمرور الوقت، مما يؤدي في النهاية إلى الفشل."],
            ["en" => "Used to promote glucose excretion by blocking its reabsorption in the kidney. In addition to lowering blood glucose, this class may also promote weight loss and cardiovascular benefits.", "ar" => "يستخدم لتعزيز إفراز الجلوكوز عن طريق منع إعادة امتصاصه في الكلى. بالإضافة إلى خفض نسبة الجلوكوز في الدم، قد تعزز هذه الفئة أيضًا فقدان الوزن وفوائد القلب والأوعية الدموية."],
            ["en" => "Used to activate nuclear transcription factor PPAR-γ, resulting in increased insulin sensitivity.", "ar" => "يستخدم لتنشيط عامل النسخ النووي PPAR-γ، مما يؤدي إلى زيادة حساسية الأنسولين."],
            ["en" => "Used to stimulate insulin release and decrease hepatic glucose production. Mild adverse effects include headache and upper respiratory infections.", "ar" => "يستخدم لتحفيز إفراز الأنسولين وتقليل إنتاج الجلوكوز الكبدي. وتشمل الآثار الضارة الخفيفة الصداع والتهابات الجهاز التنفسي العلوي."],
            ["en" => "Used to stimulate insulin secretion by pancreatic beta cells.", "ar" => "يستخدم لتحفيز إفراز الأنسولين بواسطة خلايا بيتا البنكرياسية."],
            ["en" => "Used to inhibit intestinal alpha glucosidase, preventing the breakdown of carbohydrates into simple sugars and ultimately resulting in lower postprandial blood glucose.", "ar" => "يستخدم لتثبيط إنزيم الجلوكوزيداز ألفا المعوي، مما يمنع تحلل الكربوهيدرات إلى سكريات بسيطة ويؤدي في النهاية إلى انخفاض نسبة الجلوكوز في الدم بعد الأكل."]
        ];
        $descriptions = [$painKillers, $antiBiotics, $foodSupplements, $cardiovascular, $intestinal, $musculoskeletal, $dermatology, $endocrine];
        $j = 0;
        for ($i = 0; $i < sizeof($commercial_names); $i++) {
            $medicine = Medicine::create([
                'commercial_name' => $commercial_names[$i],
                'scientific_name' => $scientific_names[$i],
                'description' => $descriptions[$j][rand(0, sizeof($descriptions[$j]) - 1)],
            ]);
            //category
            if ($commercial_names[$i]["en"] == "Bincure" || $commercial_names[$i]["en"] == "Diacol" || $commercial_names[$i]["en"] == "Orphipal" || $commercial_names[$i]["en"] == "Anasol-Proct" || $commercial_names[$i]["en"] == "Zithropenda" || $commercial_names[$i]["en"] == "Ultra MSM" || $commercial_names[$i]["en"] == "Amlodipine") $j++;
            $category = Category::where('name->en', $categoies[$j])->first();

            //image
            $image = "public\medistMedicines\\" . $medicine->commercial_name . '.png';
            $medicine->category()->associate($category);
            if (file_exists("public\medistMedicines\\" . $medicine->commercial_name . '.jpg')) {
                $image = "public\medistMedicines\\" . $medicine->commercial_name . '.jpg';
            }
            $medicine->addMedia($image)->preservingOriginal()->toMediaCollection('medicine');

            //doses
            $doses = MedicineDetails::inRandomOrder()->where('medicine_id', 0)->groupBy('dose')->limit(rand(1, 4))->get();
            $medicine->details()->saveMany($doses);
            $medicine->save();
        }
    }
}
