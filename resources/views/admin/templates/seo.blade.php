<div class="block__seo">
    <div class="form-group row">
        <div class="text-pos col-2">
            <label for="">Meta Title</label>
        </div>
        <div class="col-10">
            <input type="text" data-action="changeMetaTitle" name="meta_title" class="form-control"
            value="{{ $metaTitle ?? '' }}">
        </div>
    </div>
    <div class="form-group row">
        <div class="text-pos col-2">
            <label for="">Meta Description</label>
        </div>
        <div class="col-10">
            <textarea class="form-control" data-action="changeMetaDesc"  name="meta_desc">{{$metaDesc ?? ''}}</textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="text-pos col-2">
            <label for="">Meta Keyword</label>
        </div>
        <div class="col-10">
            <input type="text" class="form-control"  name="meta_keyword"
            value="{{ $metaKeyword ?? ''}}" >
        </div>
    </div>

    <div class="seo__preview d-none">
        <a href="">
            <h3 data-content="metaTitle">{{$metaTitle}}</h3>
        </a>
        <div  data-content="metaDesc">
            {{$metaDesc}}
        </div>
    </div>
</div>