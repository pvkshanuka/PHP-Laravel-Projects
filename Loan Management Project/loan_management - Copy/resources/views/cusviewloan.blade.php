

@foreach($cusmodel as $data)
<aside class="profile-nav alt">
    <section class="card">
        <div class="card-header user-header alt bg-dark">
            <div class="media">
                <a href="#">
                    <img class="align-self-center rounded-circle mr-3"
                        style="width:85px; height:85px;" alt=""
                src="{{$data->img}}">
                </a>
                <div class="media-body">
                    <h2 class="text-light display-6" id="cname">{{$data->name}}</h2>
                    <p id="cnic">{{$data->line1}}</p>
                </div>
            </div>
        </div>


        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#" id="cmobile"> <i class="fa fa-phone">&nbsp;&nbsp;&nbsp;</i>{{$data->pno}} </a>
            </li>
        </ul>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#" id="cmobile"> <i class="fa  fa-road">&nbsp;&nbsp;&nbsp;</i>{{$data->routename}} </a>
            </li>
        </ul>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a href="#" id="cmobile"> <i class="fa  fa-level-up">&nbsp;&nbsp;&nbsp;</i>{{$data->cuslevelname}} </a>
            </li>
        </ul>

    </section>
</aside>
@endforeach