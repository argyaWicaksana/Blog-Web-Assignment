<?php


// Random Quotes wkwk
//  Add your quotes here
//          vvv
$quotes = array(
    'The pessimist sees difficulty in every opportunity. The optimist sees opportunity in every difficulty',
    'Don’t let yesterday take up too much of today.',
    'Concentrate all your thoughts upon the work in hand. The sun rays do not burn until brought to a focus.',
    'Either you run the day or the day runs you.',
    'Setting goals is the first step in turning the invisible into the visible.',
    'He who conquers himself is the mightiest warrior',
    'Siapa yang menjauhkan diri dari sifat suka mengeluh maka berarti ia mengundang kebahagiaan',
    'Tanpa tindakan, pengetahuan tidak ada gunanya dan pengetahuan tanpa tindakan itu sia-sia.',
    'Kecerdasan yang paling cerdas adalah takwa, dan kebodohan yang paling bodoh adalah maksiat',
    'Tanpa ilmu, amal itu tidak ada gunanya. Sedangkan ilmu tanpa amal adalah hal yang sia-sia.',
    'Mahkota seseorang adalah akalnya. Derajat seseorang adalah agamanya. Sedangkan kehormatan seseorang adalah budi pekertinya.',
    'Berpegang teguhlah pada kebenaran, bahkan meski kebenaran itu akan membunuhmu',
    'Jangan berlebihan dalam mencintai sehingga menjadi keterikatan, jangan pula berlebihan dalam membenci sehingga membawa kebinasaan.',
    'Bila engkau menemukan cela pada seseorang dan engkau hendak mencacinya, maka cacilah dirimu, karena celamu lebih banyak darinya.',
    'Tidak ada rasa bersalah yang dapat mengubah masa lalu dan tidak ada kekhawatiran yang dapat mengubah masa depan.',
    'Lidah akan terus berkata jujur selagi hatinya ikhlas dan luhur.',
    'Terkadang, orang dengan masa lalu paling kelam akan menciptakan masa depan yang paling cerah.',
    'Di antara pendosa, yang paling buruk adalah dia yang meluangkan waktunya untuk membahas kesalahan orang lain',
    'Buatlah tujuan untuk hidup, kemudian gunakan segenap kekuatan untuk mencapainya, kamu pasti berhasil',
    'Derajat keimanan yang paling tinggi adalah bahwa kamu selalu merasa berada di hadapan Allah.',
    'Jangan tertipu oleh orang yang membaca Alquran. Tapi lihatlah kepada mereka yang perilakunya sesuai dengan Alquran itu.',
    'Barangsiapa yang jernih hatinya, akan diperbaiki pula oleh Allah pada apa yang nyata di wajahnya',
    'Kebajikan yang ringan adalah menunjukkan muka berseri-seri dan mengucapkan kata-kata lemah lembut.',
    'Derajat keimanan yang paling tinggi adalah bahwa kamu selalu merasa berada di hadapan Allah.',
    'Setiap orang diberi masalah sesuai dengan kemampuannya.',
    'Kenali kebenaran, maka kamu akan tahu orang-orang yang benar. Benar Tidak diukur oleh orang-orangnya, tetapi manusia diukur oleh kebenaran.',
    'Bila kau cemas dan gelisah akan sesuatu, masuklah ke dalamnya sebab ketakutan menghadapinya lebih mengganggu daripada sesuatu yang kau takuti sendiri',
    'Jangan pernah membuat keputusan dalam kemarahan dan jangan pernah membuat janji dalam kebahagiaan.',
    'Janganlah engkau mengucapkan perkataan yang engkau sendiri tak suka mendengarnya jika orang lain mengucapkannya kepadamu.',
    'A man who has committed a mistake and doesn’t correct it is committing another mistake.',
    'A successful man is one who can lay a firm foundation with the bricks others have thrown at him',
    'Setting goals is the first step in turning the invisible into the visible',
    'There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The third way is to be kind.',
    'Talent wins games, but teamwork and intelligence win championships.',
    'Coming together is a beginning. Keeping together is progress. Working together is success.'
);

$quotes = $quotes[array_rand($quotes)];

//set the seed for mtrand with the number of microseconds
//since the last full second of the clock

mt_srand((float)microtime() * 1000000);
//computes a random integer 0-4
$number = mt_rand(0, 5);
