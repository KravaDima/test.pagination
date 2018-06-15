@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users</div>
                <div id="app2">
                    <ul>
                        <li v-for="user in users">
                            @{{ user.id }} - @{{ user.name }} - <a :href="'' + user.email" class="text-success font-weight-bold">@{{ user.email }}</a>
                        </li>
                    </ul>
                    <nav  v-if="pagination && users" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"
                                :class="{ 'disabled' : !pagination.links.previous}">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Previous"
                                   @click.prevent="getUser(pagination.current_page - 1)">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li v-for="page in parseInt(pagination.total_pages)"
                                class="page-item"
                                :class="{ 'active' : pagination.current_page === page}">
                                <a class="page-link" href="#" @click.prevent="getUser(page)">@{{ page }}</a>
                            </li>
                            <li class="page-item"
                                :class="{ 'disabled' : !pagination.links.next}">
                                <a class="page-link"
                                   href="#"
                                   aria-label="Next"
                                   @click.prevent="getUser(pagination.current_page + 1)">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/user.js') }}"></script>
@endsection


