@extends('Mahasiswa.LayoutMahasiswa')

@section('main')
    <main class="w-[1139px] ml-[330px] min-h-screen my-10 flex flex-col">


        <div class="flex items-center justify-between">

            <div class="text-[#404D61] mt-5">
                <p class="font-semibold text-2xl">Profile</p>
            </div>

            <div class="flex items-center">
                <ul class="ml-auto flex flex-row mt-6">
                    <li class="mr-8">
                        <img src="{{ asset('icon/lonceng.png') }}" alt="">
                    </li>
                    <li class="mr-8">
                        <img src="{{ asset('icon/dosen.png') }}" alt="">
                    </li>
                    <li class="mr-4">
                        <p class="text-xl font-semibold">Syra Athaya</p>
                    </li>
                </ul>
            </div>
        </div>


        <div class="flex flex-col w-full">

            <div class="flex flex-row justify-between items-center mt-8 space-x-6">

                <div class="w-80 basis-2/5 bg-white shadow-lg shadow-slate rounded-3xl flex flex-col relative">

                    <button type="button" onclick="toEditProfile()">
                        <img class="absolute top-0 right-0 mt-4 me-4"
                            src="{{ asset('icon/Mahasiswa/Profile/ic_baseline-edit.png') }}"></img>
                    </button>

                    <button class="self-center" onclick="saveImage()">
                        <div class="flex flex-row bg-slate-100 w-56 h-56 rounded-full mt-12 p-16 items-center justify-center">
                            <img class="w-16 h-16" src="{{ asset('icon/Mahasiswa/Profile/camera.png') }}" alt="">
                        </div>
                    </button>


                    <div id="container_profile" class="mt-6 ms-8 space-y-4">
                        {{-- <p class="text-md">Nama : Syra Athayya</p>
                        <p class="text-md">NIM : 22/503872/SV/21552</p>
                        <p class="text-md">IPK : 3.90   </p>
                        <p class="text-md">SKS : 144</p> --}}
                    </div>

                    <div class="flex flex-row my-6 items-center">
                        <p class="text-md border-main_green border-2 w-fit px-4 rounded-xl ms-8">CV</p>
                        <img class="ms-10" src="{{ asset('icon/Mahasiswa/Profile/link.png') }}" alt="">
                        <p class="text-md ">Portofolio</p>
                    </div>

                </div>


                <div class="flex flex-col space-y-6 basis-4/5">
                    <div class="bg-white w-full shadow-lg shadow-slate rounded-3xl flex flex-col relative p-6">
                        <button type="button" onclick="toEditContact()">
                            <img class="absolute top-0 right-0 mt-4 me-4"
                                src="{{ asset('icon/Mahasiswa/Profile/ic_baseline-edit.png') }}"></img>
                        </button>
                        <p class=" bg-semi_dark_green text-white p-2 px-6 rounded-full w-fit">Contact</p>

                        <div class="flex flex-row px-4 pe-8 space-x-20 mt-8 w-full justify-center">
                            <div class="basis-1/2 space-y-4">
                                <div id="container_email" class="flex flex-row items-center">
                                    <img src="{{ asset('icon/Mahasiswa/Profile/email.png') }}" alt="">
                                    {{-- <p class="text-md ms-6">shyraathayya@gmail.com</p> --}}
                                </div>

                                <div id="container_web" class="flex flex-row items-center">
                                    <img src="{{ asset('icon/Mahasiswa/Profile/globe.png') }}" alt="">
                                    {{-- <p class="text-md ms-6">-</p> --}}
                                </div>

                                <div id="container_noHp" class="flex flex-row items-center">
                                    <img src="{{ asset('icon/Mahasiswa/Profile/phone.png') }}" alt="">
                                    {{-- <p class="text-md ms-6">+62 6894 890 890</p> --}}
                                </div>

                            </div>


                            <div class="basis-1/2 space-y-4">
                                <div id="container_linkedin" class="flex flex-row items-center">
                                    <img src="{{ asset('icon/Mahasiswa/Profile/Vector (6).png') }}" alt="">
                                    {{-- <p class="text-md ms-6">https://www.linkedin.com/in/shyrath3104</p> --}}
                                </div>

                                <div id="container_github" class="flex flex-row items-center">
                                    <img src="{{ asset('icon/Mahasiswa/Profile/Github.png') }}" alt="">
                                    {{-- <p class="text-md ms-6">https://github.com/username</p> --}}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="bg-white w-auto shadow-lg shadow-slate rounded-3xl flex flex-col relative p-6">
                        <button type="button" onclick="toEditPrestasi()">
                            <img class="absolute top-0 right-0 mt-4 me-4"
                                src="{{ asset('icon/Mahasiswa/Profile/ic_baseline-edit.png') }}"></img>
                        </button>

                        <p class=" bg-semi_dark_green text-white p-2 px-6 rounded-full w-fit">Prestasi dan Keahlian</p>

                        <div class="flex flex-row items-center mt-6">
                            <img src="{{ asset('icon/Mahasiswa/Profile/MortarBoard.png') }}" alt="">
                            <p class="text-md ms-6">UI/UX , Project Manager, Database, Web Programming, AI</p>
                        </div>

                        <div class="flex flex-row mt-6 items-start">
                            <img src="{{ asset('icon/Mahasiswa/Profile/Trophy (1).png') }}" alt="">
                            <ul class="ms-8 list-disc ">
                                <li>
                                    <p>Peraih Medali Emas LKTI 2023</p>
                                </li>
                                <li>
                                    <p>Juara Himpunan 3 LIDM</p>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-white p-6 w-full relative flex flex-col shadow-lg shadow-slate rounded-3xl mt-10">
                <button type="button" onclick="toEditPengalaman()">
                    <img class="absolute top-0 right-0 mt-4 me-4"
                        src="{{ asset('icon/Mahasiswa/Profile/ic_baseline-edit.png') }}"></img>
                </button>
                <p class=" bg-semi_dark_green text-white p-2 px-6 rounded-full w-fit">Pengalaman</p>
                <div class="flex flex-row mt-6 ms-4 w-fit">
                    <img class="w-10 h-10" src="{{ asset('icon/Mahasiswa/Profile/telkomsel.png') }}" alt="">
                    <div class="flex-col ms-6">
                        <p>PT. TELKOMSEL</p>
                        <p>3 bulan</p>
                    </div>
                </div>

                <div class="flex-col ms-6 mt-4">
                    <ul class="ms-8 list-disc space-y-4">
                        <li>
                            <p>UI UX DESIGNER</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore
                                et dolore magna aliqua.</p>
                        </li>
                        <li>
                            <p>UI UX DESIGNER</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore
                                et dolore magna aliqua.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </main>
    @stack('script')
@endsection

<script>
    function toEditPrestasi() {
        window.location.href = "{{ route('mahasiswa.profilePrestasiUpdate') }}";
    }

    function toEditContact() {
        window.location.href = "{{ route('mahasiswa.profileUpdate') }}";
    }

    function toEditPengalaman() {
        window.location.href = "{{ route('mahasiswa.profilePengalamanUpdate') }}";
    }

    async function fetchProjects(page = 1) {

        try {
            const response = await fetch(`http://127.0.0.1:8001/api/student/1`);
            const data = await response.json();
            // console.log(data.data);
            displayProfile(data.data);
            displayContacts(data.data);
        } catch (error) {
            console.error('Error:', error);
        }
    }

    function displayProfile(projects) {

        const container_profile = document.getElementById('container_profile');
        container_profile.innerHTML = '';
        // console.log(container_profile);

        const nama = document.createElement('p');
        nama.classList.add('text-md');
        nama.textContent = "Nama : " + projects.user["first_name"] + " " + projects.user["last_name"];

        const nim = document.createElement('p');
        nim.classList.add('text-md');
        nim.textContent = "NIM : " + projects["NIM"];

        const ipk = document.createElement('p');
        ipk.classList.add('text-md');
        ipk.textContent = "IPK : " + projects["IPK"];

        const sks = document.createElement('p');
        sks.classList.add('text-md');
        sks.textContent = "SKS : " + projects["SKS"];

        container_profile.appendChild(nama);
        container_profile.appendChild(nim);
        container_profile.appendChild(ipk);
        container_profile.appendChild(sks);

    }

    function displayContacts(projects) {
        const container_email = document.getElementById('container_email');
        const container_web = document.getElementById('container_web');
        const container_noHp = document.getElementById('container_noHp');
        const container_linkedin = document.getElementById('container_linkedin');
        const container_github = document.getElementById('container_github');

        const emailTxt = document.createElement('p');
        emailTxt.classList.add('text-md', 'ms-6');
        emailTxt.textContent = projects.user["email"];
        container_email.appendChild(emailTxt);

        const webTxt = document.createElement('p');
        webTxt.classList.add('text-md', 'ms-6');
        webTxt.textContent = "link portofolio"
        container_web.appendChild(webTxt);

        const noHpTxt = document.createElement('p');
        noHpTxt.classList.add('text-md', 'ms-6');
        noHpTxt.textContent = projects["phone_number"];
        container_noHp.appendChild(noHpTxt);

        const linkedinTxt = document.createElement('p');
        linkedinTxt.classList.add('text-md', 'ms-6');
        linkedinTxt.textContent = "link linkedin";
        container_linkedin.appendChild(linkedinTxt);

        const githubTxt = document.createElement('p');
        githubTxt.classList.add('text-md', 'ms-6');
        githubTxt.textContent = "link github";
        container_github.appendChild(githubTxt);


    }

    fetchProjects();
</script>