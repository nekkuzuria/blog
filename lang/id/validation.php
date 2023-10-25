<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut berisi pesan kesalahan default yang digunakan oleh
    | kelas validator. Beberapa aturan ini memiliki beberapa versi seperti
    | aturan-atuan ukuran. Anda bebas mengatur ulang setiap pesan di sini.
    |
    */

    'accepted' => ':attribute harus diterima.',
    'accepted_if' => ':attribute harus diterima ketika :other adalah :value.',
    'active_url' => ':attribute harus merupakan URL yang valid.',
    'after' => ':attribute harus merupakan tanggal setelah :date.',
    'after_or_equal' => ':attribute harus merupakan tanggal setelah atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandung huruf.',
    'alpha_dash' => ':attribute hanya boleh mengandung huruf, angka, tanda hubung, dan garis bawah.',
    'alpha_num' => ':attribute hanya boleh mengandung huruf dan angka.',
    'array' => ':attribute harus merupakan array.',
    'ascii' => ':attribute hanya boleh mengandung karakter alfanumerik satu byte dan simbol.',
    'before' => ':attribute harus merupakan tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus merupakan tanggal sebelum atau sama dengan :date.',
    'between' => [
        'array' => ':attribute harus memiliki antara :min dan :max item.',
        'file' => ':attribute harus memiliki ukuran antara :min dan :max kilobita.',
        'numeric' => ':attribute harus berada antara :min dan :max.',
        'string' => ':attribute harus memiliki panjang antara :min dan :max karakter.',
    ],
    'boolean' => ':attribute harus bernilai true atau false.',
    'can' => ':attribute mengandung nilai yang tidak diizinkan.',
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'current_password' => 'Kata sandi salah.',
    'date' => ':attribute harus merupakan tanggal yang valid.',
    'date_equals' => ':attribute harus merupakan tanggal yang sama dengan :date.',
    'date_format' => ':attribute harus sesuai dengan format :format.',
    'decimal' => ':attribute harus memiliki :decimal tempat desimal.',
    'declined' => ':attribute harus ditolak.',
    'declined_if' => ':attribute harus ditolak ketika :other adalah :value.',
    'different' => ':attribute dan :other harus berbeda.',
    'digits' => ':attribute harus memiliki :digits digit.',
    'digits_between' => ':attribute harus memiliki antara :min dan :max digit.',
    'dimensions' => ':attribute memiliki dimensi gambar yang tidak valid.',
    'distinct' => ':attribute memiliki nilai duplikat.',
    'doesnt_end_with' => ':attribute tidak boleh diakhiri dengan salah satu dari: :values.',
    'doesnt_start_with' => ':attribute tidak boleh diawali dengan salah satu dari: :values.',
    'email' => ':attribute harus merupakan alamat email yang valid.',
    'ends_with' => ':attribute harus diakhiri dengan salah satu dari: :values.',
    'enum' => ':attribute yang dipilih tidak valid.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'file' => ':attribute harus merupakan berkas.',
    'filled' => ':attribute harus memiliki nilai.',
    'gt' => [
        'array' => ':attribute harus memiliki lebih dari :value item.',
        'file' => ':attribute harus memiliki ukuran lebih dari :value kilobita.',
        'numeric' => ':attribute harus lebih besar dari :value.',
        'string' => ':attribute harus memiliki panjang lebih dari :value karakter.',
    ],
    'gte' => [
        'array' => ':attribute harus memiliki :value item atau lebih.',
        'file' => ':attribute harus memiliki ukuran lebih besar atau sama dengan :value kilobita.',
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'string' => ':attribute harus memiliki panjang lebih besar atau sama dengan :value karakter.',
    ],
    'image' => ':attribute harus merupakan gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ':attribute harus ada di dalam :other.',
    'integer' => ':attribute harus merupakan bilangan bulat.',
    'ip' => ':attribute harus merupakan alamat IP yang valid.',
    'ipv4' => ':attribute harus merupakan alamat IPv4 yang valid.',
    'ipv6' => ':attribute harus merupakan alamat IPv6 yang valid.',
    'json' => ':attribute harus merupakan string JSON yang valid.',
    'lowercase' => ':attribute harus dalam huruf kecil.',
    'lt' => [
        'array' => ':attribute harus memiliki kurang dari :value item.',
        'file' => ':attribute harus memiliki ukuran kurang dari :value kilobita.',
        'numeric' => ':attribute harus kurang dari :value.',
        'string' => ':attribute harus memiliki panjang kurang dari :value karakter.',
    ],
    'lte' => [
        'array' => ':attribute tidak boleh memiliki lebih dari :value item.',
        'file' => ':attribute harus memiliki ukuran kurang atau sama dengan :value kilobita.',
        'numeric' => ':attribute harus kurang atau sama dengan :value.',
        'string' => ':attribute harus memiliki panjang kurang atau sama dengan :value karakter.',
    ],
    'mac_address' => ':attribute harus merupakan alamat MAC yang valid.',
    'max' => [
        'array' => ':attribute tidak boleh memiliki lebih dari :max item.',
        'file' => ':attribute tidak boleh memiliki ukuran lebih dari :max kilobita.',
        'numeric' => ':attribute tidak boleh lebih dari :max.',
        'string' => ':attribute tidak boleh memiliki panjang lebih dari :max karakter.',
    ],
    'max_digits' => ':attribute tidak boleh memiliki lebih dari :max digit.',
    'mimes' => ':attribute harus merupakan berkas dengan tipe: :values.',
    'mimetypes' => ':attribute harus merupakan berkas dengan tipe: :values.',
    'min' => [
        'array' => ':attribute harus memiliki setidaknya :min item.',
        'file' => ':attribute harus memiliki ukuran setidaknya :min kilobita.',
        'numeric' => ':attribute harus setidaknya :min.',
        'string' => ':attribute harus memiliki panjang setidaknya :min karakter.',
    ],
    'min_digits' => ':attribute harus memiliki setidaknya :min digit.',
    'missing' => ':attribute harus hilang.',
    'missing_if' => ':attribute harus hilang ketika :other adalah :value.',
    'missing_unless' => ':attribute harus hilang kecuali :other adalah :value.',
    'missing_with' => ':attribute harus hilang ketika :values hadir.',
    'missing_with_all' => ':attribute harus hilang ketika :values hadir.',
    'multiple_of' => ':attribute harus merupakan kelipatan dari :value.',
    'not_in' => ':attribute yang dipilih tidak valid.',
    'not_regex' => 'Format :attribute tidak valid.',
    'numeric' => ':attribute harus merupakan angka.',
    'password' => [
        'letters' => ':attribute harus mengandung setidaknya satu huruf.',
        'mixed' => ':attribute harus mengandung setidaknya satu huruf besar dan satu huruf kecil.',
        'numbers' => ':attribute harus mengandung setidaknya satu angka.',
        'symbols' => ':attribute harus mengandung setidaknya satu simbol.',
        'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Silakan pilih :attribute yang berbeda.',
    ],
    'present' => ':attribute harus hadir.',
    'prohibited' => ':attribute dilarang.',
    'prohibited_if' => ':attribute dilarang ketika :other adalah :value.',
    'prohibited_unless' => ':attribute dilarang kecuali :other adalah dalam :values.',
    'prohibits' => ':attribute melarang :other untuk hadir.',
    'regex' => 'Format :attribute tidak valid.',
    'required' => 'Bidang :attribute wajib diisi.',
    'required_array_keys' => ':attribute harus berisi entri untuk: :values.',
    'required_if' => ':attribute diperlukan ketika :other adalah :value.',
    'required_if_accepted' => ':attribute diperlukan ketika :other diterima.',
    'required_unless' => ':attribute diperlukan kecuali :other adalah dalam :values.',
    'required_with' => ':attribute diperlukan ketika :values hadir.',
    'required_with_all' => ':attribute diperlukan ketika :values hadir.',
    'required_without' => ':attribute diperlukan ketika :values tidak hadir.',
    'required_without_all' => ':attribute diperlukan ketika tidak ada dari :values yang hadir.',
    'same' => ':attribute harus cocok dengan :other.',
    'size' => [
        'array' => ':attribute harus berisi :size item.',
        'file' => ':attribute harus memiliki ukuran :size kilobita.',
        'numeric' => ':attribute harus memiliki ukuran :size.',
        'string' => ':attribute harus memiliki panjang :size karakter.',
    ],
    'starts_with' => ':attribute harus diawali dengan salah satu dari: :values.',
    'string' => ':attribute harus merupakan string.',
    'timezone' => ':attribute harus merupakan zona waktu yang valid.',
    'unique' => ':attribute telah ada sebelumnya.',
    'uploaded' => ':attribute gagal diunggah.',
    'uppercase' => ':attribute harus dalam huruf besar.',
    'url' => ':attribute harus merupakan URL yang valid.',
    'ulid' => ':attribute harus merupakan ULID yang valid.',
    'uuid' => ':attribute harus merupakan UUID yang valid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut menggunakan
    | konvensi "attribute.rule" untuk memberi nama barisnya. Ini membuatnya lebih cepat
    | untuk menentukan pesan bahasa kustom tertentu untuk aturan atribut tertentu.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'pesan-kustom',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menggantikan placeholder atribut kami
    | dengan sesuatu yang lebih mudah dipahami oleh pembaca, seperti "Alamat E-Mail" bukan
    | dari "email". Ini hanya membantu kami membuat pesan lebih ekspresif.
    |
    */

    'attributes' => [],

];
