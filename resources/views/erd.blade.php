@extends('layouts.app')

@section('title', 'ERD | KursusKu')

@section('content')

<style>
    .erd-page {
        padding: 30px 20px;
        color: #49372f;
    }

    .erd-header {
        background: linear-gradient(135deg, #49332c, #765647);
        color: #fff8ef;
        padding: 30px;
        border-radius: 18px;
        margin-bottom: 35px;
    }

    .erd-header h1 {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .erd-header p {
        margin: 0;
        color: #f1dfcf;
    }

    .erd-diagram {
        position: relative;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        align-items: center;
        gap: 5%;
        padding: 35px 10px;
    }

    .erd-table {
        position: relative;
        z-index: 2;
        background: #fffdf9;
        border: 2px solid #8b6a55;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 8px 22px rgba(73, 51, 44, .12);
    }

    .erd-table h3 {
        background: #594034;
        color: #fff8ef;
        text-align: center;
        padding: 17px 10px;
        margin: 0;
        font-size: 20px;
        font-weight: 700;
    }

    .erd-field {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 15px;
        border-bottom: 1px solid #eadfd5;
        font-size: 14px;
        min-height: 42px;
    }

    .erd-field:last-child {
        border-bottom: none;
    }

    .erd-field-name {
        font-weight: 500;
    }

    .erd-tag {
        display: inline-block;
        min-width: 35px;
        text-align: center;
        padding: 3px 7px;
        border-radius: 5px;
        font-size: 11px;
        font-weight: 800;
    }

    .tag-pk {
        background: #f2d69b;
        color: #684719;
    }

    .tag-fk {
        background: #d8e6f3;
        color: #24527c;
    }

    .tag-uq {
        background: #e5d9ed;
        color: #68447d;
    }

    .erd-connectors {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }

    .erd-connectors path {
        fill: none;
        stroke: #9a755c;
        stroke-width: 3;
        stroke-linecap: round;
    }

    .erd-connectors circle {
        fill: #9a755c;
    }

    .erd-relations {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-top: 25px;
    }

    .erd-info {
        background: #fffaf4;
        border: 1px solid #e6d5c7;
        border-radius: 14px;
        padding: 20px;
    }

    .erd-info h3 {
        color: #594034;
        font-size: 18px;
        margin: 0 0 12px;
    }

    .erd-info p {
        margin: 8px 0;
        line-height: 1.6;
        font-size: 14px;
    }

    .erd-note {
        background: #f3e9df;
        border-left: 4px solid #9a755c;
        padding: 15px 18px;
        border-radius: 8px;
        margin-top: 22px;
        font-size: 14px;
        line-height: 1.6;
    }

    @media (max-width: 850px) {
        .erd-diagram {
            grid-template-columns: 1fr;
            gap: 25px;
            padding: 10px 0;
        }

        .erd-connectors {
            display: none;
        }

        .erd-relations {
            grid-template-columns: 1fr;
        }

        .erd-header h1 {
            font-size: 24px;
        }
    }
</style>

<div class="erd-page">

    <div class="erd-header">
        <h1>Entity Relationship Diagram</h1>
        <p>Diagram hubungan database pada sistem KursusKu</p>
    </div>

    <div class="erd-diagram">

        {{-- Garis penghubung antartabel --}}
        <svg class="erd-connectors" viewBox="0 0 1200 650"
             preserveAspectRatio="none">

            {{-- Participants 1 ke Enrollments N --}}
            <path d="M 350 325 H 420 Q 450 325 470 325 H 500" />
            <circle cx="350" cy="325" r="5" />
            <circle cx="500" cy="325" r="5" />

            {{-- Courses 1 ke Enrollments N --}}
            <path d="M 850 325 H 780 Q 750 325 730 325 H 700" />
            <circle cx="850" cy="325" r="5" />
            <circle cx="700" cy="325" r="5" />
        </svg>

        {{-- Tabel Participants --}}
        <div class="erd-table">
            <h3>Participants</h3>

            <div class="erd-field">
                <span class="erd-tag tag-pk">PK</span>
                <span class="erd-field-name">id</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">name</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">email</span>
                <span class="erd-tag tag-uq">UNIQUE</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">phone</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">created_at</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">updated_at</span>
            </div>
        </div>

        {{-- Tabel Enrollments --}}
        <div class="erd-table">
            <h3>Enrollments</h3>

            <div class="erd-field">
                <span class="erd-tag tag-pk">PK</span>
                <span class="erd-field-name">id</span>
            </div>
            <div class="erd-field">
                <span class="erd-tag tag-fk">FK</span>
                <span class="erd-field-name">participant_id</span>
            </div>
            <div class="erd-field">
                <span class="erd-tag tag-fk">FK</span>
                <span class="erd-field-name">course_id</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">status</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">created_at</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">updated_at</span>
            </div>
        </div>

        {{-- Tabel Courses --}}
        <div class="erd-table">
            <h3>Courses</h3>

            <div class="erd-field">
                <span class="erd-tag tag-pk">PK</span>
                <span class="erd-field-name">id</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">code</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">name</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">description</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">fee</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">quota</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">start_date</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">status</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">created_at</span>
            </div>
            <div class="erd-field">
                <span class="erd-field-name">updated_at</span>
            </div>
        </div>

    </div>

    <div class="erd-relations">

        <div class="erd-info">
            <h3>Keterangan</h3>
            <p><span class="erd-tag tag-pk">PK</span> Primary Key</p>
            <p><span class="erd-tag tag-fk">FK</span> Foreign Key</p>
            <p><span class="erd-tag tag-uq">UNIQUE</span> Nilai tidak boleh duplikat</p>
            <p><strong>1 : N</strong> Satu data berhubungan dengan banyak data</p>
        </div>

        <div class="erd-info">
            <h3>Relasi Antar Tabel</h3>
            <p>• Satu peserta dapat memiliki banyak pendaftaran (Participant hasMany Enrollment).</p>
            <p>• Satu kursus dapat memiliki banyak pendaftaran (Course hasMany Enrollment).</p>
            <p>• Setiap pendaftaran terhubung dengan satu peserta dan satu kursus.</p>
            <p>• Peserta dan kursus memiliki relasi many-to-many melalui tabel Enrollments.</p>
        </div>

    </div>

    <div class="erd-note">
        <strong>Catatan:</strong> Tabel Enrollments menjadi tabel penghubung antara
        Participants dan Courses. Kolom <strong>participant_id</strong> dan
        <strong>course_id</strong> merupakan foreign key yang menghubungkan
        ketiga tabel tersebut.
    </div>

</div>

@endsection