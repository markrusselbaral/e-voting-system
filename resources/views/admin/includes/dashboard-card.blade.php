 <div class="cardCon">
    @foreach($votes as $value)
    <div class="cards">
        <div class="header">{{ $value->position }}</div>
        <div class="cbody">
            <div class="cdetails">
                <div class="cname">
                    <span style="width: 50%;">Name</span>
                    <span style="width: 50%;">Vote Counts</span>
                </div>
            </div>
            @foreach($value->votes as $vote)
            <div class="cdetails">
                <div class="cname">
                    <span style="width: 50%; font-weight: bold;">{{ $vote->fname }} {{ $vote->lname }}</span>
                    <span style="width: 50%; font-weight: bold; color: green;">{{ $vote->votecount }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
     @endforeach
</div>