-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Oca 2021, 13:27:18
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blogsitesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `kadi` varchar(500) NOT NULL,
  `sifre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `kadi`, `sifre`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_id` int(11) NOT NULL,
  `site_title` varchar(200) NOT NULL,
  `site_logo` varchar(500) NOT NULL,
  `site_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_title`, `site_logo`, `site_url`) VALUES
(1, 'Blog  Sitesi', 'log.png', 'www.kitaplar-hakkinda-her-sey.com         ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_title` varchar(500) NOT NULL,
  `kategori_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_title`, `kategori_tarih`) VALUES
(1, 'Bilim Kurgu', '2020-12-06 16:26:13'),
(2, 'Macera Romanları', '2020-12-06 16:28:35'),
(3, 'Kişisel Gelişim', '2020-12-06 16:29:58'),
(4, 'Şiir', '2020-12-06 16:29:58'),
(5, 'Polisiye', '2020-12-06 16:31:03'),
(15, 'Korku Gerilim 2', '2020-12-06 19:27:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderenisim` varchar(500) NOT NULL,
  `mesaj_gonderenmail` varchar(500) NOT NULL,
  `mesaj_konu` varchar(500) NOT NULL,
  `mesaj_aciklama` text NOT NULL,
  `mesaj_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `mesaj_okunma` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`mesaj_id`, `mesaj_gonderenisim`, `mesaj_gonderenmail`, `mesaj_konu`, `mesaj_aciklama`, `mesaj_tarih`, `mesaj_okunma`) VALUES
(5, 'Talha Balaban', 'talha298@hotmail.com', 'Sponsor', 'Merhaba. Yapı Kredi Yayıncılık olarak yazılarınızı çok beğeniyoruz. Dilerseniz size bir kitap kolisi gönderebiliriz.', '2020-12-06 11:30:12', '0'),
(7, 'Sevgi Bursalı', 'sevgi_1999@gmail.com', 'Hata', 'Bilim Kurgu kategorisindeki Paradokya kitabında sanırım yanlış yazılmış. Çünkü o kitabın içeriği öyle değil.', '2020-12-06 18:04:45', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `yazi_foto` varchar(500) NOT NULL,
  `yazi_icerik` text NOT NULL,
  `yazi_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `yazi_kategori_id` int(11) NOT NULL,
  `yazi_okunma` varchar(500) NOT NULL DEFAULT '0',
  `yazi_title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_foto`, `yazi_icerik`, `yazi_tarih`, `yazi_kategori_id`, `yazi_okunma`, `yazi_title`) VALUES
(1, 'bk1.png', '<p>Fahrenheit 451, adıyla, zamanında yasaklanan kitaplardan biri olmasıyla ve her şeyden daha &ouml;nemlisi konusuyla her zaman okumak istediğim bir kitaptı. &Ccedil;oğunuzun bildiği &uuml;zere kitap bir distopya ve itfaiye teşkilatının amacının tamamen değiştiği bir d&ouml;nemi konu alıyor. Bu d&ouml;nemde itfaiyeciler kitapları yakıp yok etmekle g&ouml;revliler. Kitap okumak, kitap bulundurmak kesinlikle yasak ve bir ihbarla itfaiye kapınıza geliyor, kitaplarınızla birlikte evinizi de yakıyor. Kulağa korkun&ccedil; geliyor değil mi? Zaten okurken de kendimi &ccedil;ok rahatsız hissettim, hayal etmesi bile kabus gibiydi benim i&ccedil;in. Ana karakter Guy Montag, bir itfaiye &ccedil;alışanıdır ve onun da g&ouml;revi diğer meslektaşları gibi ihbar edilen yerlere gidip kitapları yok etmektir. Bir g&uuml;n aynı sokakta yaşayan 17 yaşında gen&ccedil; bir kızla karşılaşır ve onunla yaptığı konuşma sonunda Guy&#39;ın yaptığı işi sorgulamasına neden olur. Fahrenheit 451, g&ouml;rece kısa bir kitaptı ve mesaj verme kaygısının ağırlıklı olduğu bir hikayesi vardı. Bu y&uuml;zden eminim ki orijinal dili sade ve anlaşılırdır. Benim okuduğum &ccedil;eviride ise kesinlikle bir sorun vardı, bundan eminim. &Ccedil;eviride bir problem olması akıcılığı bozuyordu ve &ccedil;oğu yerde anlamsız gelen c&uuml;mleler okuma zevkini de yok etti ne yazık ki. Benim okuduğum basımın iki &ccedil;evirmeni var ve galiba sorun da buradan kaynaklanıyor. İş birliğini tutturamamış olabilirler. Ya da bilemiyorum, &ccedil;eviri hoşuma gitmedi. Kitapların yakıldığı bir zaman s&ouml;z konusu olduğundan insanlar etraflarında ne olup bittiğini bilmeyen, ge&ccedil;mişlerini merak etmeyen, dolayısıyla gelecekleri konusunda hi&ccedil;bir kaygı taşımayan, d&uuml;ş&uuml;nmeyen, sorgulamayan bir kitleden ibaretler. Televizyon ve medya hala etkinliğini s&uuml;rd&uuml;r&uuml;yor bu d&uuml;nyada ve insanlar &uuml;zerinde endişe verici d&uuml;zeyde bir yere, bir etkiye sahipler. Tıpkı bug&uuml;n de olduğu gibi aslında. İzlemek, okumaktan daha kolay. S&ouml;ylenen, &ouml;ylece &ouml;n&uuml;m&uuml;ze sunulan bilgiye inanmak, araştırıp sorgulamaktan daha kolay. Bug&uuml;n de bir&ccedil;ok insan, hatta bir s&uuml;r&uuml; insan televizyonun esiri değil mi? Sa&ccedil;ma sapan, insana hi&ccedil;bir şey vermeyen hatta rezilliklerle dolu programlara bağımlı halde değiller mi? Belki ben izlemiyorum evet, sen de izlemiyorsun ama bu programları izleyen hatırı sayılır bir kitle mevcut, &ouml;yle ki yayınlanmaya devam ediyorlar. Kitaptaki bir ifade beni &ccedil;ok kızdırmış, aynı zamanda &ccedil;ok &uuml;zm&uuml;şt&uuml;. Deniliyordu ki insanlar kitap okumayı zorla bırakmadılar. Bunu kendi istekleriyle yapmayı kestiler. Kitap okumak size yalnızca sahip olmadığınız bilgileri vermez; sizi yalnızca inanmadığınız şeylere inanmaya zorlamaz. Kitap okumak size bakış a&ccedil;ısı kazandırır, a&ccedil;ık g&ouml;r&uuml;şl&uuml; olmanızı sağlar. Empati yeteneğinizi geliştirir ve sizden farklı d&uuml;ş&uuml;nen, farklı inan&ccedil;lara sahip olan insanlara karşı anlayış ve hoşg&ouml;r&uuml; kazanmanıza yardım eder. Kitaplar sizi medeni kılar. Ve bu kitapların saymakla bitmeyecek faydalarından yalnızca birka&ccedil;ıdır. Kitaptaki insanların robotlardan farkının olmaması, neredeyse iradesizleşmesi ve tam anlamıyla kontrol edilen bir kitle haline gelmesindeki en &ouml;nemli sebep de bu zaten; kitap okumamaları. D&uuml;ş&uuml;n&uuml;p sorgulama yeteneğini kaybeden bu insanların aynılaşması da s&ouml;m&uuml;r&uuml;c&uuml;, baskıcı g&uuml;&ccedil;lerin onları yozlaştırıp toplu halde y&ouml;netmesini, fikirlerini dahi kontrol etmesini kolaylaştırıyor yalnızca. Kitap d&uuml;ş&uuml;nd&uuml;rd&uuml;kleriyle ve ele aldığı hikayenin dehşet vericiliğiyle zaten d&uuml;ş&uuml;k tuttuğum beklentilerimi karşıladı. Fakat itiraf etmem gerekirse bir 1984 kadar etkileyici değildi bence. Yazarın kurguladığı d&uuml;nyanın konseptleri daha ayrıntılı bir şekilde verilebilirdi. Karakterlerin y&uuml;zeyselliği onlarla bir bağ kurma olanağını imkansız hale getiriyordu mesela. Yukarıda da dediğim gibi mesaj verme odaklı bir kitaptı, fakat yine de bunu bir kurguyla vermeye &ccedil;alışıyorsa yazarın, bu mesajı hikayenin i&ccedil;inde eritmesi gerekirdi bence. B&ouml;ylece hikaye daha vurucu olabilirdi. Karakterlerle empati kurarak duygu ve d&uuml;ş&uuml;ncelerine tanık olur, &ouml;yle bir atmosferde yaşasak biz neler yapıp neler hissederdik diye kafa yorardık. Ayrıca duygusal olarak bir ilişki kurulabilseydi, karakterlerin yaşadıkları daha derin etkiler bırakabilirdi okuyucuda. Kısacası kurmaca bir &ouml;yk&uuml;den &ccedil;ok, ders verici, uyarıcı bir kitap okumuş gibi hissettim daha &ccedil;ok. Bu olumsuz bir şey değil tabii, fakat dediğim gibi bu etken bende 1984&#39;&uuml;n daha etkileyici olduğu kanısını doğurdu. Uzun lafın kısası, bilgiye ve kitaplara erişmek bu kadar kolayken okuyun, d&uuml;ş&uuml;n&uuml;n, sorgulayın.</p>\r\n', '2020-12-05 15:25:59', 1, '20', 'Fahrenheit 451   '),
(7, 'mac1.png', '<p>Da Vinci Şifresi satışa &ccedil;ıktığı ilk haftanın sonunda b&uuml;y&uuml;k bir başarı kazandı. New York Timesın en &ccedil;ok satanlar listesine &quot;1 Numara&quot;dan girdi. Aynı zamanda Wall Street Journal, Publishers Weekly ve San Francisco Chronicleın en &ccedil;ok satanlar listesinde ilk sıradaki yerini uzun s&uuml;re korudu.</p>\r\n\r\n<p>Colombia Pictures kitabın film haklarını satın aldı. Harvard &Uuml;niversitesi Simge-Bilim Profes&ouml;r&uuml; Robert Langdon, Pariste iş gezisindeyken, gece yarısı, Louvreun yaşlı m&uuml;d&uuml;r&uuml;n&uuml;n &ouml;l&uuml; bulunduğu haberini alır. Langdon ve yetenekli Fransız kriptoloji uzmanı Sophie Neveu, cesedin etrafındaki izleri takip ederek bu garip esrar perdesini araladık&ccedil;a, ipu&ccedil;larının onları Da Vincinin tablosuna g&ouml;t&uuml;rd&uuml;ğ&uuml;n&uuml; keşfederler. B&uuml;y&uuml;k usta bu sırrı herkesin g&ouml;rebileceği bir yere, &uuml;nl&uuml; eseri Mona Lisa tablosunun i&ccedil;ine gizlemiştir. Langdon bu garip bağlantıyı a&ccedil;ığa &ccedil;ıkarınca tehlike artar. Cinayete kurban giden m&uuml;ze m&uuml;d&uuml;r&uuml; de, Sir Isaac Newton, Botticelli, Victor Hugo, Da Vinci ve aralarında diğer &uuml;nl&uuml;lerin de bulunduğu gizli bir kuruluş olan Sion Manastırı Derneğinin bir &uuml;yesidir.</p>\r\n\r\n<p>Langdon, aydınlatmaya &ccedil;alıştıkları bu tehlikeli sırrın y&uuml;z yıllardır tarihin derinliklerinde gizlendiğinden ş&uuml;phelenir. B&ouml;ylece Paris ve Londra sokaklarında amansız bir kovalamaca başlar. Langdon ve Neveu, kendilerini, atacakları her adımı &ouml;nceden bilen esrarengiz olduğu kadar da &ccedil;ok zeki olan bir adamla karşı karşıya bulurlar. Eğer bu karmaşık bilmeceyi &ccedil;&ouml;zemezlerse Priorynin b&uuml;y&uuml;k yankılar uyandıracak bu &ccedil;ok eski ger&ccedil;eği ebediyen kaybolacaktır.</p>\r\n', '2020-12-05 16:32:43', 2, '40', 'Da Vinci Şifresi      '),
(15, 'bk3.png', 'u kitabı bana önerilmesiyle okumaya başladım. Sonra yorumlarına baktığımdaysa insanların ya çok sevdiğini ya da çok saçma bulduğunu gördüm. Açıkçası oranlama yaparsak ben de saçma bulan taraftayım. Tabi bütün kitaplarını okumadan da bu konuda kesin karar veremiyorum. Sonlarına doğru daha eğlenceli olsa da başlarında gerçekten sıkıldığımı söylemeliyim ve yazarın amacını da tam olarak anlayamadığımı düşünüyorum. Oluşturduğu yeni evrenle dünyamızı mı eleştiriyor, yeni bir evrenle insanların ufkunu mu genişletmeye çalışıyor yoksa sadece farklı dünyalara mı götürmeyi amaçlıyor anlayabilmiş değilim doğrusu.\r\n\r\nKitap yalnız yaşayan bir adamın belediyenin elinden evini kurtarmaya çalışmasıyla başlıyor, sonundaysa aynı kişi beynini farelerden kurtarmaya çalışıyor… Bu arada asıl kahramanımızın adı Arthur. Neyse ben olaylara devam ediyorum. Belediyenin ona haber vermeden, oradan yol geçeceği için, evini yıkmaya çalışmasına karşı çıkıyor ve evini yıkacak iş makinesinin önüne yatıyor. Belediye çalışanı ve Arthur’un uzun süre çatışması kitaba konu oluyor sanıyorsunuz ki, Arthur’un en yakın arkadaşı Ford, onu dünyanın( yani kitaba göre “Yerküre”nin)  yıkılışından kurtarıyor. Dünya üzeri güçlerin yani evrenin başındaki kişiler yine yol geçeceği için Dünya’yı yok ediyor. Aynı günde Arthur’un iki evinin yıkılma planı kitaba konu olacak sanıyorsunuz ki, kitap sizi yine bambaşka yerlere götürüyor.\r\n\r\nUzun zamandır yakın arkadaşı olan Ford’un başka bir gezegenden olduğunu ve uzun süredir yerkürede mahsur kaldığını öğreniyor. Ford ve Arthur bir uzay gemisine otostop çekerek kısmen kurtuluyor. Kısmen kurtuluyor dedim çünkü kısa sürede geminin asıl mürettebatı tarafından bulunuyor ve gemiden atılıyorlar. Tam ölmek üzereyken ve bilmem kaç milyonda bir ihtimal olmasına rağmen o zamanın en büyük, en gelişmiş uzay gemisine otostop çekmiş yani kurtulmuş oluyorlar. Bu gemiye onları kimsenin almamasına rağmen birden kendilerini orda buluyorlar. Nasıl olduğundan kitapta bir daha hiç bahsedilmiyor, belki diğer ciltlerinde vardır bilemiyorum.\r\n\r\nBu gemiyi kullanan daha doğrusu çalan Ford’un kuzeni çıkıyor. Ve çok zengin olabileceklerini düşündükleri bir gezegene gidiyorlar. Aslında Ford’un kuzeni, neden gitmek istediğini kendisi bile bilmiyor. Bu gezegene inerken ve gezegenin içinde başlarına birçok şey geliyor. Aslında yerküre dahil her şeyin, varlıkların hayat amacını aramasının sonucu olduğunu ve asıl deney yapanların insanlar olmadığını öğreniyorlar.', '2020-12-06 16:50:15', 1, '20', 'Otostopçunun Galaksi Rehberi'),
(16, 'bk2.png', 'Paradokya, Timaş yayınlarından fantastik kurgu türünde çıkmış bir kitap.Arkadaşımın önerisiyle okumaya başladığım bir kitap oldu.\r\n\r\nKitabın kapağını sevdim arka kapak yazısına ise ba-yııl-dıım.\r\n\r\nVe büyük bir heyecanla okumaya başladım.\r\n\r\nGiriş kısmında \'\'Tamam,\'\' dedim \'\'bu kitap harika bir şey çıkacak.\'\'Ama yanılşmışım.Kitapta o kadar çok eksik var ki hangi birisinden başlayacağımı şaşırdım.\r\n\r\nBirden çok karakter barındırıyor ve bu karakterlerin bir tanesi bile favori karakterim diyebileceğiniz karakterlerden değil.Sanki içi hava dolu şişme balon gibiler. Onların karakter olduklarını biliyorsunuz ama hepsi şişirilmiş.Kişiliklerine dair hiçbir bilgimiz yok. Yazarın donatması lazımdı onlara bir ruh vermeyi unutmuş gibi.Oktay çıkarcı birisi olabilirdi mesela, Kemal sinirli. Ama bizimkiler o kadar masumlarki kitabı okurken \'\'çocuk kitabı mı okuyorum ben ? \'\' düşüncesine kapıldım.\r\n\r\nKarakterlerin dış görünümünü anlatan tek bir cümle yok. Sen kitap yazıyorsun sayın yazar anlat biraz. Kafamda bir şablon belirsin onun içini sen kelimelerini kullanarak boya, doldur.\r\n\r\nOkuduğum bir kitapta her zaman yakın hissettiğimiz bir karakter olur. Onun ne yapacağını, ağzından hangi kelimenin çıkacağını öğrenmek için çeviririz sayfaları.Burada bunun eksikliğini çok hissettim.\r\n\r\nVe duygu eksikliği. Bu benim olmazsa olmazlarımdan. O kitabı hissetmem gerekiyor. Zaten biz neden kitap okuyoruz ? Çünkü bir şeyler hissetmek için. Kendi sıkıcı monoton hayatımıza yeni bir heyecan yeni bir doku katmak için. Sanki buzdan bir küpün içine konulmuşuz ve çevremizi alevler sarmış yazar yanımıza gelip kulağımıza ‘’birazdan alevden yanacaksın.’’ Diyerek fısıldıyor. Fakat biz soğuktan başka bir şey hissedemiyoruz çünkü yazar buzdan kabuğumuzu kıramıyor.\r\nYazarın bizi doyurması gerekiyor.Bize bir yemek hazırlaması gerekiyor fakat o elimize peynir ekmek veriyor. Kurduğu cümleler o kadar basitki. O şunu yaptı . O heyecanlandı. O üzgün hissetti. Duygu suyuna batırılmadan önümüze konulmuş.\r\nElimde okunacak kitabım kalmamıştı bu yüzden biraz daha oku Ayşe dedim. Ve kitabın ilk bölümünü bitirdim.\r\nİkinci bölümde ise –yarısını okudum- birinci bölümdeki olaylarla neredeyse aynı olaylar yaşanıyor. Örneğin : birinci bölümde çocuk, kitabı okuduktan uykuya yenik düşmemeye çalışıyor ve ardından ‘’yi de ne kadar dayanabilirim ki ? ‘’ diye düşünüyor. İkinci kısımda ise başka bir çocuk aynı şeyleri tekrar ediyor.\r\nBunca eleştiri saydın döktün ama niye 224 sayfa okudun diye sorarsanız şöyle açıklayayım: kitapta çözmemiz için bize verilen şifreler. Onları çözmek çok eğlenceliydi. Kitaptan zevk aldığım tek kısım şifrelerdi.\r\nKitaplar için açılmış bir de web sitesi var. Şifrelerin çözümü için oraya tıklıyorsunuz. Fakat bu ne derece doğru ? Yani belki internetim yok. Ya da kitabı okuduğum yerde internet yok.\r\nLisede değilde ortaokulda olsaydım ya da fazla kitap okumamış olsaydım hoşuma giderdi herhalde. Fakat benim için fazla basit bir kitap oldu.', '2020-12-06 16:56:56', 1, '23', 'Paradokya'),
(17, 'mac2.png', 'Yazarın tüm kitaplarını okuduğum için kıyaslama yapacak olursam bu kitabı İhanet Noktası ve Kayıp Sembol kitaplarından yukarıya ama Melekler ve Şeytanlar, Da Vinci Şifresi, Cehennem kitaplarından aşağıda bir yere koyabilirim.şahane bir başlangıç ile kitap okurunu içine bir çırpıda çekiyor ama konu ilerledikçe sürekli bir şeyler havada kalıyor.Anlatım çok güzel ama kurguda çok bariz hatalar var ve bu hatalra kurgunun önüne geçiyor malesef.Kitabın konusuna gelecek olursam biraz spoiler vereceğim için yorumun bundan sonrasını kitabı okumayanlar okumazsa iyi olur.\r\nÖnceki kitaplarından tadığımız ana karakter Robert Langdon bu kitapta da var.Bildiğiniz Langdon işte.Buluttan nem kapan bir adam.Her sembolün, her notanın, her caddenin, her şiirin altından mutlaka bir şeyler buluyor.Bu arada Langdon yine ne yapıp edip başını belaya sokmayı başarıyor.\r\nEdmond Kirsch:Milyarder tenoloji dehası.Militan ateist.Tüm dinleri bitireceğini idda ettiği bir buluşu var ve bunu öncelikle tuhaf bir biçimde üç dinin üç silik alimine gösteriyor.Tabi din adamları başlıyor tutuşmaya.Velhasıl Kirsch bu buluşunu tüm dünyaya anlatacağı sırada canlı yayında öldürülüyor.\r\nAmbra Vidal: Milyarder dahinin kankası müze müdürü.İspanya prensinin nişanlısı olması dışında bir numarası yok.\r\nİspanya Prensi: Kırk yaşında ispanya tahtının tek varisi ama ergen gibi hareketleri var.Çocuğu olmasını istediği halde 39 yaşındaki Vidal\'e yürüyor. Kadına canlı yayında evlenme teklif ediyor falan.Kadın da atarlı bu arada.Prens lan karşındaki.Havan kime senin.\r\nİspanya Kralı: Gay\r\nWinston: Bir tür süper bilgisayara bağlı yapay zeka.Edmond\'ın yazdığı bir program.Langon ile telefonla haberleşip kanka oluyorlar.\r\nEdmond\'ın buluşu insanlığın nerden geldiği ve nereye gittiği sorularına cevap veren bir buluş (sonunda öyle olmadığını görüyoruz ya neyse)\r\nEdmond canlı yayında öldürülünce Langdon ve Vidal şüpheli duruma düşüyor ve hem polisten hem kraliyet askerlerinden kaçarak Edmond\'ın yarım kalan sunumunu dünyaya yayınlamak istiyorlar.Devrim niteliğinde dediklerine bakmayın.Buluş falan yok ortada.Tahminler üzerinden fikir yürütülmüş.İnsanlar ilerde makine-insan formuna dönüşüyor.Dünyayı makineler ele geçiriyor falan.\r\nKitap boyunca dine ağzına geleni söyleyip finalde sağduyunun sesi Langdon\'un Din asla yok olmayacak.Din iyidir falan gibi söylemleriyle kitabı ne şiş yansın ne kabap şeklinde bitirmiş.\r\nNe diyelim.Yine kitap yazsa yine okurum ama eleştirimi de yaparım.', '2020-12-06 17:02:16', 2, '10', 'Başlangıç'),
(18, 'kisi.png', '\" Öğrenilmiş Çaresizlik \" nedir, ne değildir? Cesaret insanın neler başarmasına sebep olabilir? Gerçekten önümüzdeki fırsatları atılmaktan korkmadan yakalarsak bir şeyler değişebilir mi?\r\nBu soruları daha niceleriyle sıralayabilirim ama temel yapı taşları bunlarla açıklanabilir şeklinde düşünüyorum. Verdiği örneklerle o kadar güzel açıklamış ki Mümin Sekman \"Öğrenilmiş Çaresizlik\" kavramını.. Aklımda kalan en net konu bu. Köpekbalığı ve küçük balık örneklemesi daha doğrusu deneyi çok hoşuma gitti. Kişisel Gelişim kitaplarını çok anlamsız bulsam da bana güzel kavramlar kattığı için tavsiye edebilirim bu kitabı.', '2020-12-06 17:07:45', 3, '4', 'Her Şey Seninle Başlar'),
(19, 'siir.png', 'Böyle kitaplar bir günde oturup bitirilmemeli bence. Sindire, sindire okunmalı, tat alarak, güzelce algılayarak. Ne yazık ki, Cemal Süreyyanın her şiirini anlayacak kadar iyi bir okur değilim, bu yüzden bazılarını (genelde anladıklarımı :)) çok beğendim, bazılarını ise sadece okuduğumla kaldım.\r\nŞiir ince ruhlu insanların işi, herkese göre değil, ama bu denemenize engel olmamalı. Öyle oturup, rasgele bir sayfasını açıp okuyabilirsiniz mesela, belki anlarsınız. sevebilirsiniz bile. ;)', '2020-12-06 17:10:18', 4, '5', 'Üvercinka'),
(20, 'pol1.png', 'Hayat, insan aklının keşfedebileceği düşüncelerden çok daha gariptir. Gerçekte sıradan denilen şeyleri çoğu zaman hayal bile edemeyiz. Eğer şu pencereden el ele uçup, bu büyük şehrin üzerinde dolaşarak çatıları hafifçe kaldırıp aşağıda olan garipliklere, sıra dışı tesadüflere, planlara, niyetlere ve nesilden nesle akıp giden olaylar zincirine bakabilseydik, doğası gereği sıradan ve önceden tahmin edilebilir olan insan ürünü eserlerinin hepsi, gereksiz ve donuk bir hal alırdı.\"', '2020-12-06 17:13:43', 5, '9', 'Suç Uyanıyor'),
(21, 'pol2.png', 'Beyoğlu Rapsodisi, Mutlaka Okunması Gereken En İyi Ahmet Ümit Kitaplarından biridir. İlk baskısı 2003 yılında Doğan Kitap tarafından yapılmıştır. Polisiye-gerilim türünün en iyi örneklerinden biri olan Beyoğlu Rapsodisi\'nin konusu ise şöyle:\r\n\r\nÜç arkadaşın öyküsü bu. Beyoğlu\'nda büyümüş, Beyoğlu\'nda yaşayan üç ayrı kişilik, üç ayrı kimlik, üç ayrı insan. Ölümsüzlük merakıyla başlayan ölümler. Her cinayetin ardında gizemli bir neden... Ve soruşturma boyunca adım adım, bina bina, sokak sokak Beyoğlu. O çoksesli, çokrenkli, çokdilli, çokkültürlü Beyoğlu. Günümüzün Babil Kulesi... İnsanın bencilliğini, acımasızlığını, öfkesini, çaresizliğini en iyi anlatan mekân... Soluk soluğa bir gerilim, benzersiz bir final...\r\n\r\nÇok kollu, çok dallı büyük bir ırmağa benzeyen bu muhteşem cadde, papazı, fahişesi, cami hocası, pezevengi, hahamı, Alevi dedesi, bankacısı, işportacısı, öğrencisi, öğretmeni, tinercisi, dönercisi, dekoratörü, evsizi, midye satıcısı, esrar satıcısı, kanun kaçağı, Anadolu kaçağı, Avrupa kaçağı, Amerika kaçağı, Afrika kaçağı, yani yaşam kaçağı, beyazı, karası, sarısı, kızılı yani insan görünümünde olan kim varsa, hepsini, herkesi sorgusuz sualsiz kucaklamıştı.Kiliseleri, camileri, sinagogları, hanları, hamamları, bankaları, giyim mağazaları, kitabevleri, meyhaneleri, birahaneleri, şaraphaneleri, kafeleri, kültürevleri, randevuevleri, sinemaları, tiyatroları, galerileri, vakitleri çoktan dolduğu halde ömür sürmeye çalışan bilmem kaç yüzyıllık inatçı binaları, dar sokakları, kör çıkmazlarıyla Grande Rue de Pera, Cadde-i Kebir, İstiklal Caddesi ya da Beyoğlu nasıl adlandırılırsa adlandırılsın burası her gün, her an değişen yeryüzünün en büyük tiyatro sahnesi gibiydi.\"', '2020-12-06 17:16:58', 5, '4', 'Beyoğlu Rapsodisi'),
(24, 'kor.png', 'Dracula\'yı salt korku ya da gotik edebiyatından bir örnek ya da korku edebiyatının baş yapıtlarından biri olarak tasvir etmek eseri sıradanlaştırmak olacaktır.\r\n\r\nHer şeyden önce, tarihten ilham alınarak 1800\'lü yılların sonunda ortaya konan bir karakter, kendinden sonraki yüzyıllara ilham kaynağı olmaya devam ediyor.\r\nBugün benzer tarzda hengi kitabı incelerseniz inceleyin, temel dayanağı Dracula\'dır. Binlerce yıl öncesinde günümüze kadar ulaşan; korkulan, iğrenilen bir varlıktan yakışıklı, güzel, şık, alımlı kimi zaman da sevimli bir kişiliğe bürünmesindeki en büyük etkendir belki de Dracula. Mina\'nın Dracula ve gelinlerine acıyarak bakışı, yok oluşlarında bir huzur belirtisi arayışı; Van Helsing\'in onları yok etme anındaki psikolik gelgitleri, bir zamanlar onların da insan olduğunu hatırlatır.\r\n\r\nStroker, binlerce yıllık vampirlerle ilgili mitolojik hikayeleri bir araya getirerek çok başarılı bir roman sunuyor ki; o roman, günümüz edebiyatına ve sinemasına örnek olmaya devam ediyor. Kitabın içinde Van Helsing bu hikayelere üstü kapalı değiniyor.\r\n\r\nKarakter oluşumunda 3. Vlad\'dan ilham alınması da ironik... Hayali dünyanıza bir vampir arıyorsanız, yüzlerce masumu kazığa geçiren acımasız birinden ilham almaktan daha doğru ne olabilir ki... Gerek Kazıklı Voyvoda\'nın gerekse Kanlı Kontes Elizabeth Bathory\'nin dünyada bıraktığı izlenim bu yönde.\r\n\r\n19.yy\'da yazılan bir eserin edebi diline sahip, nazik ve mesafeli.. Karakterler arasındaki saygı, edep ve nezaket çağımızın anlayamayacağı ya da yaşayamayacağı cinsten.', '2020-12-06 17:40:58', 6, '2', 'Dracula'),
(26, 'kor3.png', 'An itibari ile bitirdiğim ikinci Stephen King romanı.İlki \' Kubbe\'nin Altında\' bittiğinde bu mudur yani bu kadar övdükleri gerilim ustası King bu mu diye çok hayal kırıklığına uğramıştım. Çünkü ciddi anlamda kitabın sonu beni hiç tatmin etmemişti geneline kıyasla. Fakat bu inceleme o kitaba ait değil .\r\nGelelim bu harika bilimkurgu kitabımıza .\r\nKitapta kahramanımızın başından beri bir amacı var ve o amacın zamanı gelene kadar ki 5 yılda nerede, nasıl yaşadığı anlatılıyor yaklaşık 700 sayfa boyunca . Geriye kalan 100 sayfa ise heyecanla beklediğimiz son nasıl bir son olacak diye kesintisiz, sürükleyici bir üslupla bize sunulmuş.\r\nGerçekleri söylemem gerekirse kitabı ilk aldığımda tek hedefim bir an önce o finale gelmekti. Fakat kitabı elinize alıp başladığınızda kitabın başlı başına heyecan unsuru güdülerek, profesyonelce yazıldığını görüyorsunuz.O beş yılda finale atılan her adım ,her hikaye ayrı ayrı harikaydı. Benim favori mekanım elbette birçok okuyucu gibi Jodie oldu . Çünkü düşünün öyle bir kasaba ki herkes birbiri ile ilgili ,saygılı , insanlar gece uyurken kapılarını kilitlemiyor. Bir öğrenci kaza geçirdi diye estetik ameliyatı için para toplamak amacıyla düzenlenen tiyatroda, koskoca ünlü bir estetik doktoru bir atın poposu kostümü içinde . Düşündünüz mü? Bu kadar sıcakkanlı insanların olduğu bir kasaba işte Jodie ve burası kahramanımızın esas kızını bulduğu ve delicesine aşık olduğu yer.Onların sonunun Jodie \'de yaşlanmak ve birlikte ölmek olmasını isterdim ama bu bir hikaye ve benim istediğim değil yazarın istediği oluyor .\r\nFakat sonunda Sadie (esas kızımız ) ve Jake (kahramanımız) bu şekilde de olsa buluştukları için çok mutluyum çünkü ben de olsam ancak bu şekilde birleştirebilirdim onları diyorum. O kısım favori kısmım oldu diyebilirim ve itiraf ediyorum ki ağlayarak okudum . Çünkü ben iflah olmaz bir romantiğim ?\r\nVelhasıl internetten araştırdığıma göre King önceki eserleri ile gerilim alanında kendini kanıtlamış . Ben de ilk kitabın hayal kırıklığını unutup yeni yeni kingcikler alıp okuyacağım çünkü incelemden de anlaşıldığı gibi (umarım anlaşılmıştır ) bu kitaba bayıldım. Zaman yolculuğu hep ilgimi çekmiştir zaten.\r\nBu arada bu kitapta bazı göndermeler vardı O isimli kitabına . Filmi fazla iç karartıcı olduğu için yarım bırakmıştım. Fakat şu an Derry\'de olan biten ne varsa öğrenmek için çıldırdığımdan ilk işim filmi izlemek olacak. Hadi bana iyi seyirler ??', '2020-12-06 17:44:48', 6, '2', '22/11/63');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_ekleyen` varchar(500) NOT NULL,
  `yorum_eposta` varchar(500) NOT NULL,
  `yorum_icerik` text NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `yorum_yazi_id` int(11) NOT NULL,
  `yorum_durum` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_ekleyen`, `yorum_eposta`, `yorum_icerik`, `yorum_tarih`, `yorum_yazi_id`, `yorum_durum`) VALUES
(60, 'Büşra Yılmaz', 'busraylmz@gmail.com', 'İlk çıktığında koşarak D&R \'a gittim ve iki günde okudum.', '2020-12-06 17:49:57', 1, 1),
(62, 'Ahmet Bayrak', 'ahmettt89@gmaail.com', 'Paralel evren var mı sorusunun cevabı bu kitap yaa', '2020-12-06 17:52:21', 16, 1),
(64, 'Yelda Fırat', 'yelldfrt@gmail.com', 'Yazar yine içimizdekileri dile dökmüş.', '2020-12-06 17:54:12', 18, 0),
(65, 'Sevgi Yeter', 'svg45@gmail.com', 'Dili çok ağır hiçbir şey anlamadım.', '2020-12-06 17:54:56', 19, 1),
(66, 'Eslem Korkmaz', 'krkmaz45@gmail.com', 'Hem yeni kitap hemde Ahmet Ümitin elinden kesin çok güzeldir.', '2020-12-06 17:56:10', 21, 0),
(67, 'Derya Gökçek', 'deryaa12@gmail.com', 'İsmi çok saçma içi efsane sanırım', '2020-12-06 17:57:14', 26, 0),
(68, 'Aleyna Keskin', 'keskin55@gmail.com', 'Bu kitabı merak ediyorum ya gerçekten', '2020-12-06 17:57:50', 25, 1),
(69, 'Akif Belalı', 'bela1998@gmail.com', 'Yine saçma sapan bir kitap yapmış şu adam ya', '2020-12-06 17:58:28', 25, 0),
(70, 'Leyla Turgut', 'lyltrtg1@gmail.com', 'Yıllardır koynumda dracula beslemişim bee:)', '2020-12-06 17:59:46', 24, 1),
(72, 'emre yiğit', 'sa@gmail.com', 'asas', '2020-12-06 19:28:26', 16, 1),
(73, 'emre yiğit', 'qq@gmail.com', 'aşırı güzel', '2020-12-22 22:06:14', 7, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
