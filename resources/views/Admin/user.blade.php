@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Users</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="index.html">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">All User</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="wg-table table-all-user">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-center">UserType</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td class="pname">
                                            <div class="image">
                                                <img src="{{ asset('uploads/user') }}/{{ $user->image }}" alt=""
                                                    class="image">
                                            </div>
                                            <div class="name">
                                                <a href="#" class="body-title-2">{{ $user->name }}</a>
                                                <div class="text-tiny mt-3">ADM</div>
                                            </div>
                                        </td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('admin.usertype', $user->id) }}"
                                                class="w-50 h-30 btn btn-{{ $user->usertype == 'user' ? 'secondary' : 'success' }}">{{ $user->usertype }}</a>

                                            {{-- <span width="500" height="200"  target="_blank"
                                            class=" badge badge-{{ $user->usertype == 'user' ? 'secondary' : 'success' }}">{{ $user->usertype }}</span> --}}
                                        </td>
                                        <td>
                                            <div class="list-icon-function">
                                                <a href="#">
                                                    <div class="item edit">
                                                        <i class="icon-edit-3"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                </div>
            </div>
        </div>
    </div>
@endsection
