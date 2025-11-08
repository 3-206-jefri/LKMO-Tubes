import React from "react";
import { useParams, useNavigate } from "react-router-dom";

export default function Article() {
  const { id } = useParams();
  const navigate = useNavigate();

  // Sample article data
  const articles = {
    1: {
      id: 1,
      title: "Memahami Glukosa Darah",
      image: "/assets/Glukosa.jpg",
      content: [
        {
          type: "heading",
          text: "Apa itu Glukosa Darah?"
        },
        {
          type: "paragraph",
          text: "Glukosa Glukosa adalah sumber energi yang paling umum bagi tubuh. Khususnya, glukosa adalah bentuk gula yang dapat diserap tubuh setelah memecah makanan yang Anda konsumsi."
        },
        {
          type: "paragraph",
          text: "Meskipun berbeda-beda sepanjang hari, kadar glukosa darah biasanya paling rendah setelah puasa atau tidur dalam waktu lama dan paling tinggi setelah makan. Pankreas mendeteksi saat kadar glukosa darah naik, sehingga membuatnya melepaskan hormon yang disebut insulin. Insulin menurunkan kadar glukosa dalam tubuh dan berfungsi sebagai kunci yang memungkinkan glukosa untuk masuk ke sel."
        },
        {
          type: "paragraph",
          text: "Kadar glukosa darah lazimnya berbeda- beda, tapi terdapat rentang target, rentang tinggi, dan rentang rendah. Anda dapat menjaga kesehatan secara keseluruhan dengan menjaga agar rerata kadar Anda berada di rentang target."
        },
        {
          type: "heading",
          text: "Kenapa Harus Peduli?"
        },
        {
          type: "paragraph",
          text: "Mengetahui kadar glukosa darah Anda seiring waktu dapat membantu memahami risiko diabetes Anda atau, jika Anda sudah mengidap diabetes, membantu Anda menanganinya. Diabetes adalah penyebab utama kematian di seluruh dunia dan jumlah orang dengan kondisi tersebut terus bertambah."
        },
        {
          type: "paragraph",
          text: "Kadar gula tinggi dapat merusak pembuluh darah dan bagian tubuh lainnya. Ini berarti orang dengan diabetes memiliki risiko masalah kesehatan serius yang lebih besar, seperti serangan jantung, strok, hilangnya penglihatan atau kebutaan, dan penyakit ginjal atau gagal ginjal. Mereka juga mengalami sistem kekebalan tubuh yang melemah, risiko infeksi yang lebih besar, sirkulasi yang buruk pada kaki, dan kerusakan saraf."
        },
        {
          type: "heading",
          text: "Cara Mengukur Glukosa Darah"
        },
        {
          type: "paragraph",
          text: "Tusuk jari, tes darah, atau monitor glukosa darah berkelanjutan adalah tiga cara untuk memeriksa glukosa darah. Dokter dapat menganjurkan pengukuran glukosa pada waktu yang berbeda sepanjang hari untuk memeriksa bagaimana makanan, latihan, dan pengobatan memengaruhinya."
        },
        {
          type: "paragraph",
          text: "Dokter biasanya menempatkan orang dengan glukosa darah tinggi ke salah satu dari empat kategori."
        },
        {
          type: "heading",
          text: "Pradiabetes"
        },
        {
          type: "paragraph",
          text: "Pradiabetes berarti gula darah Anda lebih tinggi dari normal, tapi tidak cukup tinggi untuk dianggap diabetes. Tanpa perubahan pada diet dan olahraga, orang dewasa dan anak-anak dengan kondisi ini akan lebih berkemungkinan untuk mengidap diabetes Tipe 2."
        },
        {
          type: "heading",
          text: "Diabetes Tipe 2"
        },
        {
          type: "paragraph",
          text: "Ini adalah bentuk diabetes paling umum dan terjadi saat tubuh memproduksi insulin, tapi tidak menggunakannya secara efektif."
        },
        {
          type: "paragraph",
          text: "Meskipun diabetes Tipe 2 biasanya muncul di kalangan orang yang berumur di atas 45 tahun, Anda dapat mengidapnya pada umur berapa pun."
        },
        {
          type: "paragraph",
          text: "Anda akan lebih berisiko mengidap diabetes Tipe 2 jika berusia lanjut, berberat badan berlebih, memiliki riwayat diabetes di keluarga, atau tidak aktif secara fisik. Risiko Anda juga meningkat jika pernah memiliki diabetes gestasional."
        },
        {
          type: "heading",
          text: "Diabetes Tipe 1"
        },
        {
          type: "paragraph",
          text: "Jenis yang dialami kira-kira 10% dari semua pengidap diabetes. Diabetes Tipe 1 adalah jenis diabetes paling umum di kalangan anak-anak, tapi dapat muncul pada umur berapa pun. Diabetes ini terjadi saat sistem kekebalan tubuh menghancurkan sel yang menghasilkan insulin. Hilangnya kemampuan untuk menghasilkan insulin mengakibatkan peningkatan kadar glukosa darah secara terus-menerus. Dokter tidak yakin kenapa tubuh menyerang sel tersebut, tapi genetik atau pemaparan terhadap virus dapat berperan."
        },
        {
          type: "paragraph",
          text: "Diabetes Gestasional (Diabetes selama kehamilan) Ini adalah kondisi sementara yang memengaruhi sebagian orang selama kehamilan. Hormon terkait kehamilan dapat mengubah bagaimana tubuh dapat menggunakan insulin, sehingga menyebabkan kadar glukosa yang tinggi."
        },
        {
          type: "heading",
          text: "Cara Mengelola Kadar Glukosa Darah"
        },
        {
          type: "paragraph",
          text: "Sebagian orang dengan diabetes harus menggunakan insulin atau pengobatan lainnya untuk mengatur kadar glukosa darah mereka di bawah pengawasan dokter."
        },
        {
          type: "paragraph",
          text: "Semua orang yang tertarik untuk menurunkan kadar glukosa darah mereka dapat terbantu dengan memakan makanan sehat, berolahraga dengan cukup, dan menghindari tembakau."
        },
        {
          type: "paragraph",
          text: "Makan buah, sayur, dan gandum utuh sambil menghindari gula tambahan atau minuman gula, lemak jenuh, dan lemak trans adalah fondasi yang baik bagi diet sehat. Bagaimana Anda mengolah makanan berpengaruh besar. Selain itu, makanan yang dibakar atau dipanggang juga lebih sehat dari yang digoreng. Waktu dan porsi makan Anda juga sama pentingnya dengan apa yang Anda makan. Dokter mungkin akan dapat memberi Anda pola makan yang sesuai bagi Anda.Anda akan lebih berisiko mengidap diabetes Tipe 2 jika berusia lanjut, berberat badan berlebih, memiliki riwayat diabetes di keluarga, atau tidak aktif secara fisik. Risiko Anda juga meningkat jika pernah memiliki diabetes gestasional."
        },
        {
          type: "paragraph",
          text: "Olahraga juga dapat menurunkan kadar gula darah. Konsultasi kepada dokter untuk memeriksa apakah Anda cukup sehat untuk berolahraga. Jika iya, target seharusnya paling tidak 30 menit aktivitas berintensitas sedang pada sebagian besar hari. Ini dapat meliputi jalan kaki cepat, melakukan pekerjaan rumah, memotong rumput, "
        },
      ],
      tags: ["Nutrisi", "Kesehatan", "Diabetes", "Energi"],
      relatedArticles: [2, 3]
    },
    2: {
      id: 2,
      title: "Pelajari Kebugaran Jantung",
      image: "/assets/Threadmill.jpg",
      content: [
        {
          type: "paragraph",
          text: "Kebugaran jantung, atau kebugaran kardiorespirasi, adalah kemampuan tubuh Anda untuk menyerap, mengedarkan, dan menggunakan oksigen. Proses ini mengandalkan bagian tubuh yang vital- jantung, paru-paru, otot, serta darah dan pembuluh darah yang menghubungkannya."
        },
        {
          type: "paragraph",
          text: "Hal ini menjadikan tingkat kebugaran jantung sebagai indikator yang baik bagi kebugaran Anda secara keseluruhan."
        },
        {
          type: "paragraph",
          text: "Untuk mengukur kebugaran jantung, ilmuwan mengembangkan metrik yang disebut VO2 maks. Metrik ini merepresentasikan jumlah maksimum oksigen yang dapat digunakan tubuh Anda selama latihan. Semakin tinggi VO2 maks Anda, semakin efisien sistemnya, dan semakin bugar tubuh Anda. Dengan demikian, pemahaman terhadap VO2 maks bermanfaat bagi semua orang-baik Anda seorang atlet Profesional, membentuk badan, atau mengidap penyakit."
        },
        {
          type: "heading",
          text: "Bagaimana VO2 Maks Diukur?"
        },
        {
          type: "paragraph",
          text: "Pengukuran VO2 maks yang akurat memerlukan perlengkapan khusus dan latihan berat di lab atau gim. Namun, Anda dapat memperoleh perkiraan VO2 maks menggunakan detak jantung dan data gerakan dari pelacak kebugaran. Misalnya, Apple Watch dapat merekam perkiraan VO2 maks Anda setelah beberapa menit berjalan kaki, berlari, atau mendaki."
        },
        {
          type: "paragraph",
          text: "Prediksi VO2 maks sangat bergantung pada umur dan jenis kelamin Anda. Prediksi tersebut juga dapat dipengaruhi oleh pengobatan jantung tertentu yang diresepkan."
        },
        {
          type: "heading",
          text: "Kenapa Anda Harus Peduli Jika Kebugaran Jantung Rendah?"
        },
        {
          type: "paragraph",
          text: "Kebugaran kardio dapat menjadi prediktor yang penting bagi kesehatan jangka panjang Anda. Terdapat kaitan antara kebugaran jantung yang rendah dengan risiko masalah kesehatan yang besar di masa mendatang. Di mana pun level kebugaran jantung Anda sekarang, semakin tinggi Anda dapat menaikkannya dengan aman, semakin baik."
        },
        {
          type: "heading",
          text: "Meningkatkan Kebugaran Jantung Anda"
        },
        {
          type: "paragraph",
          text: "Latihan aerobik yang menaikkan detak jantung dan membuat Anda terengah-engah adalah pemacu terbaik. Olahraga seperti berlari, bersepeda, atau latihan interval berintensitas tinggi itu bagus. Bahkan melalui beberapa tanjakan saat berjalan kaki sehari-hari dapat menjadi awal yang baik."
        },
        {
          type: "heading",
          text: "Kapan Anda Harus Berkonsultasi ke Dokter"
        },
        {
          type: "paragraph",
          text: "Jika VO2 maks Anda berada di kisaran bawah dan Anda mempertimbangkan untuk mengubah rutinitas latihan Anda secara drastis, Anda dianjurkan untuk mengonsultasikannya dengan dokter terlebih dahulu—apalagi jika menurut Anda hal tersebut disebabkan oleh suatu kondisi."
        },
        {
          type: "paragraph",
          text: "Perubahan besar pada tanda vital mana pun dapat menunjukkan perubahan dalam kesehatan Anda secara keseluruhan yang patut dibicarakan dengan dokter Anda."
        },
      ],
      tags: ["Kardio", "Jantung", "Olahraga", "Kesehatan"],
      relatedArticles: [1, 3]
    },
    3: {
      id: 3,
      title: "Latihan yang Dapat Meningkatkan Stabilitas Berjalan Kaki",
      image: "/assets/Jogging.jpg",
      content: [
        {
          type: "heading",
          text: "Kenapa Stabilitas Berjalan Kaki Menurun"
        },
        {
          type: "paragraph",
          text: "Penurunan stabilitas berjalan kaki dalam waktu singkat biasanya terjadi karena alasan spesifik, seperti cedera. Namun, jika menurun dalam waktu beberapa bulan atau tahun, itu dapat disebabkan banyak hal dan penyebab pastinya mungkin lebih sulit diketahui."
        },
        {
          type: "paragraph",
          text: "Kadang, ini hanya disebabkan oleh penurunan kekuatan dan kemampuan kita untuk bergerak akibat penuaan. Umur juga dapat berpengaruh pada sistem di telinga dalam Anda yang mengontrol keseimbangan. Ini bahkan dapat diakibatkan oleh kondisi yang mendasari, pengobatan, hilangnya penglihatan, atau faktor lainnya. Dokter juga mungkin dapat membantu jika Anda tidak dapat mengidentifikasi penyebab pasti."
        },
        {
          type: "heading",
          text: "Kenapa Anda Harus Peduli"
        },
        {
          type: "paragraph",
          text: "Stabilitas berjalan kaki berkaitan langsung dengan risiko terjatuh. Seiring dengan menurunnya stabilitas, risiko terjatuh akan naik. Seiring dengan bertambahnya umur, kemungkinan kita untuk cedera karena terjatuh meningkat drastis dan jatuh adalah penyebab utama cedera otak traumatis dan tulang retak di kalangan lansia."
        },
        {
          type: "paragraph",
          text: "Dengan melacak stabilitas berjalan kaki Anda, dan mengawasi perubahan seiring waktu, anda akan dapat melihat perubahan sejak dini. Selain itu, semakin awal Anda mendeteksi masalah, semakin awal Anda dapat mengambil langkah untuk memperbaikinya."
        },
        {
          type: "heading",
          text: "Latihan Yang Dapat Membantu"
        },
        {
          type: "paragraph",
          text: "Jika stabilitas berjalan kaki Anda OKE, latihan yang dapat meningkatkan kekuatan, keseimbangan, dan fleksibilitas seperti Tai Chi atau yoga dapat membantu Anda mempertahankan atau meningkatkan stabilitas Anda."
        },
        {
          type: "paragraph",
          text: "Jika stabilitas berjalan kaki Anda rendah atau sangat rendah dan Anda ingin memperbaikinya, konsultasikan kepada dokter. Dokter dapat menganjurkan rangkaian latihan kekuatan dan keseimbangan yang disesuaikan dengan Anda dan memberikan rujukan program latihan yang telah terbukti mengurangi risiko terjatuh. Mungkin Anda juga akan menerima panduan mengenai seberapa sering Anda harus melakukan latihan. Contoh latihan ini dapat memberikan anda gambaran."
        },
        {
          type: "heading",
          text: "Latihan Kekuatan"
        },
        {
          type: "paragraph",
          text: "Duduk-Berdiri: Latihan ini dapat membantu memperkuat otot di kaki bagian atas. Anda dapat menggunakan tangan untuk membantu berdiri dan duduk. Seiring dengan bertambahnya kekuatan, Anda dapat mengurangi penggunaan tangan."
        },
        {
          type: "paragraph",
          text: "Angkat Betis: Perkuat otot kaki bagian bawah Anda dengan latihan ini. Kursi dapat membantu Anda menjaga keseimbangan pada fase awal."
        },
        {
          type: "heading",
          text: "Latihan Keseimbangan"
        },
        {
          type: "paragraph",
          text: "Peregangan Pinggul: Ini dapat memperkuat otot pada pinggul Anda yang membantu keseimbangan. Seiring dengan meningkatnya keseimbangan, Anda juga dapat mencoba latihan ini tanpa kursi."
        },
        {
          type: "paragraph",
          text: "Berjalan Kaki Setapak: Melakukan latihan ini membantu meningkatkan keseimbangan Anda saat Anda berjalan kaki secara normal."
        },
        {
          type: "heading",
          text: "Latihan Berjalan Kaki"
        },
        {
          type: "paragraph",
          text: "Berjalan Kaki Membentuk Angka Delapan: Berjalan kaki, putar arah, dan berjalan kaki kembali dapat meningkatkan keseimbangan serta kekuatan Anda seiring waktu."
        },
        {
          type: "heading",
          text: "Kiat Keselamatan"
        },
        {
          type: "paragraph",
          text: "Selain meningkatkan stabilitas Anda, ada beberapa hal lain yang dapat Anda lakukan untuk mengurangi risiko terjatuh."
        },
        {
          type: "paragraph",
          text: "Pakaian dan sepatu yang sesuai dapat membantu Anda agar tidak tersandung. Kenakan celana pendek atau celana yang tidak longgar dan pertimbangkan untuk mengenakan sepatu yang mendukung dengan alas tidak terlalu melar."
        }
      ],
      tags: ["Keseimbangan", "Walking", "Stabilitas", "Latihan"],
      relatedArticles: [1, 2]
    }
  };

  const article = articles[id] || articles[1];

  const renderContent = (content) => {
    return content.map((block, index) => {
      switch (block.type) {
        case "paragraph":
          return (
            <p key={index} className="article-paragraph">
              {block.text}
            </p>
          );
        case "heading":
          return (
            <h2 key={index} className="article-subheading">
              {block.text}
            </h2>
          );
        case "list":
          return (
            <ul key={index} className="article-list">
              {block.items.map((item, i) => (
                <li key={i} className="article-list-item">{item}</li>
              ))}
            </ul>
          );
        case "callout":
          return (
            <div key={index} className="article-callout">
              <span className="callout-icon">💡</span>
              <p className="callout-text">{block.text}</p>
            </div>
          );
        default:
          return null;
      }
    });
  };

  return (
    <>
      <style>{`
        .article-page {
          min-height: 100vh;
          background-color: #0a0a0a;
          color: white;
          padding-bottom: 40px;
        }

        .article-header {
          position: sticky;
          top: 0;
          z-index: 100;
          background-color: rgba(10, 10, 10, 0.95);
          backdrop-filter: blur(10px);
          padding: 16px 20px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .article-header-btn {
          background: none;
          border: none;
          color: white;
          cursor: pointer;
          padding: 8px;
          display: flex;
          align-items: center;
          justify-content: center;
          border-radius: 8px;
          transition: all 0.3s ease;
        }

        .article-header-btn:hover {
          background: rgba(255, 255, 255, 0.1);
        }

        .article-header-title {
          font-size: 18px;
          font-weight: 600;
          margin: 0;
        }

        .article-hero {
          position: relative;
          width: 100%;
          height: 250px;
          overflow: hidden;
        }

        .article-hero-img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }

        .article-hero-tag {
          position: absolute;
          top: 16px;
          left: 16px;
          background: rgba(0, 0, 0, 0.7);
          backdrop-filter: blur(10px);
          padding: 8px 16px;
          border-radius: 20px;
          font-size: 12px;
          font-style: italic;
          border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .article-main {
          padding: 24px 20px;
          max-width: 800px;
          margin: 0 auto;
        }

        .article-title {
          font-size: 28px;
          font-weight: 700;
          margin: 0 0 20px 0;
          line-height: 1.3;
        }

        .article-meta {
          display: flex;
          flex-wrap: wrap;
          gap: 16px;
          margin-bottom: 32px;
          padding-bottom: 20px;
          border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .article-meta-item {
          display: flex;
          align-items: center;
          gap: 6px;
          font-size: 13px;
          color: rgba(255, 255, 255, 0.6);
        }

        .article-meta-item svg {
          width: 16px;
          height: 16px;
          stroke: rgba(255, 255, 255, 0.6);
        }

        .article-content {
          line-height: 1.8;
          font-size: 16px;
          color: rgba(255, 255, 255, 0.9);
        }

        .article-paragraph {
          margin: 0 0 20px 0;
          text-align: justify;
        }

        .article-subheading {
          font-size: 22px;
          font-weight: 600;
          margin: 32px 0 16px 0;
          color: #E06107;
        }

        .article-list {
          margin: 16px 0 24px 0;
          padding-left: 24px;
        }

        .article-list-item {
          margin-bottom: 12px;
          color: rgba(255, 255, 255, 0.85);
          line-height: 1.6;
        }

        .article-list-item::marker {
          color: #ff6b35;
        }

        .article-callout {
          background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(255, 107, 53, 0.05) 100%);
          border-left: 4px solid #ff6b35;
          padding: 16px 20px;
          margin: 24px 0;
          border-radius: 8px;
          display: flex;
          gap: 12px;
          align-items: flex-start;
        }

        .callout-icon {
          font-size: 24px;
          flex-shrink: 0;
        }

        .callout-text {
          margin: 0;
          line-height: 1.6;
          color: rgba(255, 255, 255, 0.9);
        }

        .article-tags {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
          margin: 32px 0;
          padding-top: 24px;
          border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .article-tag {
          background: rgba(255, 255, 255, 0.05);
          padding: 8px 16px;
          border-radius: 20px;
          font-size: 13px;
          color: rgba(255, 255, 255, 0.7);
          border: 1px solid rgba(255, 255, 255, 0.1);
          transition: all 0.3s ease;
          cursor: pointer;
        }

        .article-tag:hover {
          background: rgba(255, 107, 53, 0.1);
          border-color: #ff6b35;
          color: white;
        }

        .article-related-section {
          margin-top: 48px;
          padding-top: 32px;
          border-top: 2px solid rgba(255, 255, 255, 0.1);
        }

        .article-related-title {
          font-size: 22px;
          font-weight: 600;
          margin: 0 0 24px 0;
        }

        .article-related-grid {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
          gap: 20px;
        }

        .article-related-card {
          background: #1a1a1a;
          border-radius: 12px;
          overflow: hidden;
          cursor: pointer;
          transition: all 0.3s ease;
          border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .article-related-card:hover {
          transform: translateY(-4px);
          box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
          border-color: rgba(255, 107, 53, 0.5);
        }

        .article-related-image {
          width: 100%;
          height: 140px;
          overflow: hidden;
        }

        .article-related-img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          transition: transform 0.3s ease;
        }

        .article-related-card:hover .article-related-img {
          transform: scale(1.1);
        }

        .article-related-content {
          padding: 16px;
        }

        .article-related-card-title {
          font-size: 16px;
          font-weight: 600;
          margin: 0 0 8px 0;
          line-height: 1.4;
          color: white;
        }

        .article-related-card-text {
          margin: 0;
          font-size: 12px;
          color: rgba(255, 255, 255, 0.5);
        }

        @media (max-width: 768px) {
          .article-hero {
            height: 200px;
          }

          .article-title {
            font-size: 24px;
          }

          .article-subheading {
            font-size: 20px;
          }

          .article-related-grid {
            grid-template-columns: 1fr;
          }
        }

        @media (min-width: 768px) {
          .article-hero {
            height: 350px;
          }

          .article-main {
            padding: 40px 32px;
          }
        }

        @media (min-width: 1024px) {
          .article-hero {
            height: 400px;
          }
        }
      `}</style>

      <div className="article-page">
        {/* Header */}
        <header className="article-header">
          <button className="article-header-btn" onClick={() => navigate(-1)}>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
              <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
          </button>
          <h1 className="article-header-title">Article</h1>
          <button className="article-header-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
              <circle cx="18" cy="5" r="3"></circle>
              <circle cx="6" cy="12" r="3"></circle>
              <circle cx="18" cy="19" r="3"></circle>
              <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
              <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
            </svg>
          </button>
        </header>

        {/* Hero Image */}
        <div className="article-hero">
          <img src={article.image} alt={article.title} className="article-hero-img" />
          <div className="article-hero-tag">{article.subtitle}</div>
        </div>

        {/* Article Content */}
        <main className="article-main">
          <h1 className="article-title">{article.title}</h1>
          
          <div className="article-meta">
            <div className="article-meta-item">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
              <span>{article.author}</span>
            </div>
            <div className="article-meta-item">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
              </svg>
              <span>{article.date}</span>
            </div>
            <div className="article-meta-item">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
              </svg>
              <span>{article.readTime}</span>
            </div>
          </div>

          <div className="article-content">
            {renderContent(article.content)}
          </div>

          {/* Tags */}
          <div className="article-tags">
            {article.tags.map((tag, index) => (
              <span key={index} className="article-tag">
                #{tag}
              </span>
            ))}
          </div>

          {/* Related Articles */}
          <div className="article-related-section">
            <h2 className="article-related-title">Related Articles</h2>
            <div className="article-related-grid">
              {article.relatedArticles.map((relatedId) => {
                const relatedArticle = articles[relatedId];
                return (
                  <div
                    key={relatedId}
                    className="article-related-card"
                    onClick={() => navigate(`/article/${relatedId}`)}
                  >
                    <div className="article-related-image">
                      <img src={relatedArticle.image} alt={relatedArticle.title} className="article-related-img" />
                    </div>
                    <div className="article-related-content">
                      <h3 className="article-related-card-title">{relatedArticle.title}</h3>
                      <p className="article-related-card-text">{relatedArticle.readTime}</p>
                    </div>
                  </div>
                );
              })}
            </div>
          </div>
        </main>
      </div>
    </>
  );
}
