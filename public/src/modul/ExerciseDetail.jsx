import React from "react";
import { useParams, useNavigate } from "react-router-dom";
import { ArrowLeft, Share2 } from "lucide-react";

export default function ExerciseDetail() {
  const { id } = useParams();
  const navigate = useNavigate();

  // Exercise data
  const exercises = {
    1: {
      id: 1,
      name: "Push - Up",
      image: "/assets/PushUp.jpg",
      muscles: ["Chest", "Triceps", "Shoulders", "Core"],
      difficulty: "Beginner",
      duration: "10-15 minutes",
      content: [
        {
          type: "heading",
          text: "Apa itu Push-Up?"
        },
        {
          type: "paragraph",
          text: "Push-up adalah latihan kekuatan klasik yang melatih tubuh bagian atas. Gerakan ini melibatkan berbagai kelompok otot termasuk dada, bahu, trisep, dan inti tubuh. Push-up dapat dilakukan di mana saja tanpa memerlukan peralatan khusus."
        },
        {
          type: "heading",
          text: "Manfaat Push-Up"
        },
        {
          type: "list",
          items: [
            "Menguatkan otot dada, bahu, dan lengan",
            "Meningkatkan stabilitas core",
            "Meningkatkan postur tubuh",
            "Dapat dilakukan di mana saja tanpa alat",
            "Meningkatkan kekuatan fungsional untuk aktivitas sehari-hari"
          ]
        },
        {
          type: "heading",
          text: "Cara Melakukan Push-Up yang Benar"
        },
        {
          type: "paragraph",
          text: "1. Posisi Awal: Mulai dengan posisi plank, tangan selebar bahu, tubuh membentuk garis lurus dari kepala hingga tumit."
        },
        {
          type: "paragraph",
          text: "2. Gerakan Turun: Turunkan tubuh dengan menekuk siku hingga dada hampir menyentuh lantai. Jaga siku tetap dekat dengan tubuh (sekitar 45 derajat)."
        },
        {
          type: "paragraph",
          text: "3. Gerakan Naik: Dorong tubuh kembali ke posisi awal dengan meluruskan lengan. Jaga core tetap kencang sepanjang gerakan."
        },
        {
          type: "callout",
          text: "Tips: Jaga tubuh tetap lurus, hindari mengangkat pinggul terlalu tinggi atau membiarkan pinggul turun."
        },
        {
          type: "heading",
          text: "Variasi Push-Up"
        },
        {
          type: "paragraph",
          text: "Wall Push-Up: Untuk pemula, mulai dengan push-up di dinding untuk mengurangi beban."
        },
        {
          type: "paragraph",
          text: "Knee Push-Up: Lakukan push-up dengan lutut menyentuh lantai untuk mengurangi intensitas."
        },
        {
          type: "paragraph",
          text: "Diamond Push-Up: Posisikan tangan lebih dekat membentuk diamond untuk fokus pada trisep."
        },
        {
          type: "paragraph",
          text: "Wide Push-Up: Lebarkan posisi tangan untuk lebih fokus pada otot dada."
        },
        {
          type: "heading",
          text: "Program Latihan"
        },
        {
          type: "paragraph",
          text: "Pemula: 3 set x 8-10 repetisi (atau sampai failure)"
        },
        {
          type: "paragraph",
          text: "Menengah: 4 set x 15-20 repetisi"
        },
        {
          type: "paragraph",
          text: "Advanced: 4-5 set x 25-30 repetisi atau variasi yang lebih challenging"
        }
      ]
    },
    2: {
      id: 2,
      name: "Squat",
      image: "/assets/Squat.jpg",
      muscles: ["Quadriceps", "Glutes", "Hamstrings", "Core"],
      difficulty: "Beginner",
      duration: "10-15 minutes",
      content: [
        {
          type: "heading",
          text: "Apa itu Squat?"
        },
        {
          type: "paragraph",
          text: "Squat adalah latihan fundamental yang melatih otot kaki dan bokong. Gerakan ini meniru pola gerakan alami tubuh saat duduk dan berdiri, menjadikannya salah satu latihan paling fungsional untuk kehidupan sehari-hari."
        },
        {
          type: "heading",
          text: "Manfaat Squat"
        },
        {
          type: "list",
          items: [
            "Menguatkan otot kaki (paha depan, paha belakang, betis)",
            "Membentuk dan menguatkan otot bokong",
            "Meningkatkan keseimbangan dan stabilitas",
            "Membakar kalori lebih banyak",
            "Meningkatkan mobilitas pinggul dan pergelangan kaki",
            "Menguatkan core dan tulang belakang"
          ]
        },
        {
          type: "heading",
          text: "Cara Melakukan Squat yang Benar"
        },
        {
          type: "paragraph",
          text: "1. Posisi Awal: Berdiri dengan kaki selebar bahu, jari kaki sedikit menghadap keluar (10-15 derajat)."
        },
        {
          type: "paragraph",
          text: "2. Gerakan Turun: Dorong pinggul ke belakang seperti akan duduk di kursi, tekuk lutut. Turunkan tubuh hingga paha sejajar dengan lantai atau lebih rendah jika memungkinkan."
        },
        {
          type: "paragraph",
          text: "3. Posisi Lutut: Pastikan lutut searah dengan jari kaki, jangan biarkan lutut masuk ke dalam."
        },
        {
          type: "paragraph",
          text: "4. Gerakan Naik: Tekan tumit ke lantai dan dorong tubuh kembali ke posisi berdiri. Kencangkan bokong di posisi atas."
        },
        {
          type: "callout",
          text: "Tips: Jaga dada tetap tegak, pandangan lurus ke depan, dan pastikan berat badan di tumit, bukan jari kaki."
        },
        {
          type: "heading",
          text: "Kesalahan yang Sering Terjadi"
        },
        {
          type: "list",
          items: [
            "Lutut masuk ke dalam (valgus collapse)",
            "Tumit terangkat dari lantai",
            "Punggung membungkuk",
            "Tidak turun cukup dalam",
            "Gerakan terlalu cepat tanpa kontrol"
          ]
        },
        {
          type: "heading",
          text: "Variasi Squat"
        },
        {
          type: "paragraph",
          text: "Goblet Squat: Pegang dumbbell atau kettlebell di dada untuk menambah beban."
        },
        {
          type: "paragraph",
          text: "Jump Squat: Tambahkan lompatan saat naik untuk latihan plyometric."
        },
        {
          type: "paragraph",
          text: "Bulgarian Split Squat: Tempatkan satu kaki di belakang pada bangku untuk fokus unilateral."
        },
        {
          type: "heading",
          text: "Program Latihan"
        },
        {
          type: "paragraph",
          text: "Pemula: 3 set x 12-15 repetisi"
        },
        {
          type: "paragraph",
          text: "Menengah: 4 set x 20-25 repetisi"
        },
        {
          type: "paragraph",
          text: "Advanced: 4-5 set x 30-40 repetisi atau tambahkan beban"
        }
      ]
    },
    3: {
      id: 3,
      name: "Plank",
      image: "/assets/Plank.jpg",
      muscles: ["Shoulders", "Lower back", "Glutes", "Core"],
      difficulty: "Beginner",
      duration: "5-10 minutes",
      content: [
        {
          type: "heading",
          text: "Apa itu Plank?"
        },
        {
          type: "paragraph",
          text: "Plank adalah latihan isometrik yang sangat efektif untuk menguatkan otot inti (core). Berbeda dengan sit-up atau crunch, plank melatih seluruh otot core tanpa gerakan, membuatnya lebih aman untuk punggung."
        },
        {
          type: "heading",
          text: "Manfaat Plank"
        },
        {
          type: "list",
          items: [
            "Menguatkan otot core secara menyeluruh",
            "Meningkatkan stabilitas tulang belakang",
            "Memperbaiki postur tubuh",
            "Mengurangi risiko cedera punggung",
            "Meningkatkan keseimbangan",
            "Dapat dilakukan di mana saja tanpa alat"
          ]
        },
        {
          type: "heading",
          text: "Cara Melakukan Plank yang Benar"
        },
        {
          type: "paragraph",
          text: "1. Posisi Awal: Mulai dengan posisi push-up, kemudian turunkan ke siku. Siku harus berada tepat di bawah bahu."
        },
        {
          type: "paragraph",
          text: "2. Posisi Tubuh: Tubuh membentuk garis lurus dari kepala hingga tumit. Jangan biarkan pinggul turun atau naik terlalu tinggi."
        },
        {
          type: "paragraph",
          text: "3. Aktivasi Core: Kencangkan otot perut seperti sedang bersiap menerima pukulan. Jaga napas tetap teratur."
        },
        {
          type: "paragraph",
          text: "4. Tahan Posisi: Pertahankan posisi ini selama mungkin dengan teknik yang benar. Lebih baik durasi lebih pendek dengan form sempurna daripada lama tapi form buruk."
        },
        {
          type: "callout",
          text: "Tips: Pandangan ke lantai untuk menjaga leher tetap netral, dan kencangkan bokong untuk membantu stabilitas."
        },
        {
          type: "heading",
          text: "Kesalahan yang Sering Terjadi"
        },
        {
          type: "list",
          items: [
            "Pinggul turun terlalu rendah (membebani punggung bawah)",
            "Pinggul terangkat terlalu tinggi (mengurangi efektivitas)",
            "Menahan napas",
            "Kepala terlalu terangkat atau menunduk",
            "Bahu naik ke telinga"
          ]
        },
        {
          type: "heading",
          text: "Variasi Plank"
        },
        {
          type: "paragraph",
          text: "High Plank: Posisi tangan lurus seperti push-up untuk variasi yang lebih mudah."
        },
        {
          type: "paragraph",
          text: "Side Plank: Berbaring miring dengan satu siku menopang untuk melatih obliques."
        },
        {
          type: "paragraph",
          text: "Plank dengan Leg Lift: Angkat satu kaki bergantian untuk menambah challenge."
        },
        {
          type: "paragraph",
          text: "Plank to Down Dog: Variasi dinamis dengan gerakan dari plank ke posisi down dog."
        },
        {
          type: "heading",
          text: "Program Latihan"
        },
        {
          type: "paragraph",
          text: "Pemula: 3 set x 20-30 detik"
        },
        {
          type: "paragraph",
          text: "Menengah: 3 set x 45-60 detik"
        },
        {
          type: "paragraph",
          text: "Advanced: 3-4 set x 90+ detik atau variasi yang lebih challenging"
        }
      ]
    },
    4: {
      id: 4,
      name: "Jumping Jack",
      image: "/assets/JumpingJack.jpg",
      muscles: ["Calves", "Shoulders", "Glutes", "Core"],
      difficulty: "Beginner",
      duration: "5-10 minutes",
      content: [
        {
          type: "heading",
          text: "Apa itu Jumping Jack?"
        },
        {
          type: "paragraph",
          text: "Jumping Jack adalah latihan kardio yang melibatkan gerakan melompat sambil membuka dan menutup kaki serta lengan. Latihan ini sangat efektif untuk pemanasan, meningkatkan detak jantung, dan membakar kalori."
        },
        {
          type: "heading",
          text: "Manfaat Jumping Jack"
        },
        {
          type: "list",
          items: [
            "Meningkatkan detak jantung dan kardio",
            "Membakar kalori dengan efisien",
            "Melatih koordinasi tubuh",
            "Meningkatkan stamina dan endurance",
            "Pemanasan yang sempurna sebelum workout",
            "Melatih seluruh tubuh"
          ]
        },
        {
          type: "heading",
          text: "Cara Melakukan Jumping Jack yang Benar"
        },
        {
          type: "paragraph",
          text: "1. Posisi Awal: Berdiri tegak dengan kaki rapat dan lengan di samping tubuh."
        },
        {
          type: "paragraph",
          text: "2. Gerakan Lompat: Lompat sambil membuka kaki selebar bahu dan angkat lengan ke atas hingga hampir bertemu di atas kepala."
        },
        {
          type: "paragraph",
          text: "3. Kembali ke Posisi Awal: Lompat lagi sambil menutup kaki dan menurunkan lengan kembali ke samping tubuh."
        },
        {
          type: "paragraph",
          text: "4. Ritme: Lakukan gerakan dengan ritme yang konsisten, tidak terlalu cepat hingga kehilangan kontrol."
        },
        {
          type: "callout",
          text: "Tips: Mendarat dengan lembut pada ujung kaki untuk mengurangi impact pada sendi. Jaga core tetap engaged."
        },
        {
          type: "heading",
          text: "Kesalahan yang Sering Terjadi"
        },
        {
          type: "list",
          items: [
            "Mendarat dengan tumit terlebih dahulu (impact terlalu keras)",
            "Lutut lurus dan kaku saat mendarat",
            "Lengan tidak sepenuhnya terangkat",
            "Gerakan terlalu cepat dan tidak terkontrol",
            "Napas tidak teratur"
          ]
        },
        {
          type: "heading",
          text: "Variasi Jumping Jack"
        },
        {
          type: "paragraph",
          text: "Half Jacks: Hanya angkat lengan setinggi bahu untuk intensitas lebih rendah."
        },
        {
          type: "paragraph",
          text: "Power Jacks: Lompat lebih tinggi dan lebih eksplosif untuk intensitas lebih tinggi."
        },
        {
          type: "paragraph",
          text: "Cross Jacks: Silangkan kaki dan lengan di depan tubuh saat menutup."
        },
        {
          type: "paragraph",
          text: "Star Jumps: Bentangkan kaki dan lengan lebih lebar membentuk bintang."
        },
        {
          type: "heading",
          text: "Program Latihan"
        },
        {
          type: "paragraph",
          text: "Pemula: 3 set x 20-30 repetisi"
        },
        {
          type: "paragraph",
          text: "Menengah: 3-4 set x 40-50 repetisi"
        },
        {
          type: "paragraph",
          text: "Advanced: 4-5 set x 60-100 repetisi atau durasi 1-2 menit non-stop"
        },
        {
          type: "heading",
          text: "Kapan Melakukan Jumping Jack"
        },
        {
          type: "paragraph",
          text: "Jumping Jack sangat cocok sebagai pemanasan sebelum workout utama, sebagai bagian dari HIIT (High Intensity Interval Training), atau sebagai active recovery di antara latihan kekuatan."
        }
      ]
    }
  };

  const exercise = exercises[id] || exercises[1];

  const renderContent = (content) => {
    return content.map((block, index) => {
      switch (block.type) {
        case "paragraph":
          return (
            <p key={index} className="mb-4 text-gray-300 leading-relaxed">
              {block.text}
            </p>
          );
        case "heading":
          return (
            <h2 key={index} className="text-xl font-bold mb-3 mt-6 text-[#E06107]">
              {block.text}
            </h2>
          );
        case "list":
          return (
            <ul key={index} className="mb-4 space-y-2">
              {block.items.map((item, i) => (
                <li key={i} className="flex items-start gap-3 text-gray-300">
                  <span className="text-orange-500 mt-1">•</span>
                  <span>{item}</span>
                </li>
              ))}
            </ul>
          );
        case "callout":
          return (
            <div key={index} className="bg-orange-500/10 border border-orange-500/30 rounded-xl p-4 mb-4 flex gap-3">
              <span className="text-orange-500 text-xl flex-shrink-0">💡</span>
              <p className="text-gray-200 text-sm leading-relaxed">{block.text}</p>
            </div>
          );
        default:
          return null;
      }
    });
  };

  return (
    <div className="min-h-screen bg-black text-white pb-10">
      {/* Header */}
      <div className="sticky top-0 z-50 bg-black/95 backdrop-blur-sm border-b border-gray-800 px-6 py-4 flex justify-between items-center">
        <button
          onClick={() => navigate(-1)}
          className="p-2 hover:bg-gray-800 rounded-lg transition-colors"
        >
          <ArrowLeft size={24} />
        </button>
        <h1 className="text-lg font-semibold">Exercise Guide</h1>
        <button className="p-2 hover:bg-gray-800 rounded-lg transition-colors">
          <Share2 size={24} />
        </button>
      </div>

      {/* Hero Image */}
      <div className="relative w-full h-64 overflow-hidden">
        <img
          src={exercise.image}
          alt={exercise.name}
          className="w-full h-full object-cover"
        />
        <div className="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
      </div>

      {/* Content */}
      <div className="px-6 -mt-20 relative z-10">
        {/* Title & Meta */}
        <div className="mb-6">
          <h1 className="text-3xl font-bold mb-4">{exercise.name}</h1>
          
          <div className="flex flex-wrap gap-2 mb-4">
            {exercise.muscles.map((muscle, index) => (
              <span
                key={index}
                className="px-3 py-1 bg-gray-800 rounded-full text-xs text-gray-300"
              >
                {muscle}
              </span>
            ))}
          </div>

          <div className="flex gap-4 text-sm text-gray-400">
            <div className="flex items-center gap-2">
              <span className="text-orange-500">⚡</span>
              <span>{exercise.difficulty}</span>
            </div>
            <div className="flex items-center gap-2">
              <span className="text-orange-500">⏱️</span>
              <span>{exercise.duration}</span>
            </div>
          </div>
        </div>

        {/* Content Body */}
        <div className="text-base">
          {renderContent(exercise.content)}
        </div>

        {/* Related Exercises */}
        <div className="mt-10 pt-8 border-t border-gray-800">
          <h3 className="text-xl font-bold mb-4">Latihan Lainnya</h3>
          <div className="grid grid-cols-1 gap-4">
            {Object.values(exercises)
              .filter((ex) => ex.id !== exercise.id)
              .slice(0, 2)
              .map((relatedEx) => (
                <div
                  key={relatedEx.id}
                  onClick={() => navigate(`/exercise/${relatedEx.id}`)}
                  className="bg-gray-900 rounded-xl overflow-hidden flex gap-4 cursor-pointer hover:bg-gray-800 transition-colors"
                >
                  <img
                    src={relatedEx.image}
                    alt={relatedEx.name}
                    className="w-24 h-24 object-cover"
                  />
                  <div className="flex-1 py-3 pr-4">
                    <h4 className="font-semibold mb-2">{relatedEx.name}</h4>
                    <div className="flex flex-wrap gap-1">
                      {relatedEx.muscles.slice(0, 2).map((muscle, idx) => (
                        <span
                          key={idx}
                          className="px-2 py-0.5 bg-gray-800 rounded text-xs text-gray-400"
                        >
                          {muscle}
                        </span>
                      ))}
                    </div>
                  </div>
                </div>
              ))}
          </div>
        </div>
      </div>
    </div>
  );
}
