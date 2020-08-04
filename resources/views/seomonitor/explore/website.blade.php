@extends('layouts.seomonitor')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Explore
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="explore-keywords-tab" data-toggle="pill" href="#explore-keywords" role="tab" aria-controls="pills-home" aria-selected="true">Keywords</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="explore-websites-tab" data-toggle="pill" href="#explore-websites" role="tab" aria-controls="pills-profile" aria-selected="false">Websites</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="explore-keywords" role="tabpanel" aria-labelledby="explore-keywords-tab">
                  <form method="GET" action="{{ route('seomonitor.explore.keyword') }}">
                      <div class="form-group">
                          <label>Keyword</label>
                          <input type="text" name="keyword">
                          <button type="submit" class="btn btn-primary">
                              Search
                          </button>
                      </div>
                  </form>
              </div>
              <div class="tab-pane fade" id="explore-websites" role="tabpanel" aria-labelledby="explore-websites-tab">
                  <form method="GET" action="{{ route('seomonitor.explore.website') }}">
                      <div class="form-group">
                          <label>Domain</label>
                          <input type="text" name="domain">
                          <button type="submit" class="btn btn-primary">
                              Search
                          </button>
                      </div>
                  </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
