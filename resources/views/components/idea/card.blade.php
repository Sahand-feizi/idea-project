 @props(['idea'])

 <x-card is="div">
     @if ($idea->image_path)
         <a href="/ideas/{{ $idea->id }}">
             <div class="overflow-hidden mb-2 -mx-4 -mt-4">
                 <img src="{{ asset('storage/' . $idea->image_path) }}" alt=""
                     class="w-full max-h-40 object-cover">
             </div>
         </a>
     @endif
     <a href="/ideas/{{ $idea->id }}">
         <h3 class="text-xl font-bold text-foreground">{{ $idea->title }}</h3>
         <x-status class="m-2" :status="$idea->status" />
     </a>

     <div class="mt-6 porse">
         {!! $idea->formattedDescription !!}
     </div>

     <div class="mt-5">
         {{ $idea->created_at->diffForHumans() }}
     </div>
 </x-card>
