<x-layout title="Edit Event: {{$event->name}}" :show_navbar="true" :show_heading="true">
    <x-slot:heading>
        Edit Event: {{$event->name}}
    </x-slot:heading>
    <form class="p-6 lg:p-8" method="POST" action="/events/{{$event->id}}">
        @csrf
        @method('PATCH')

        <div class="grid grid-cols-5 border-b border-gray-900/10  gap-x-6">
            <div class="space-y-12 col-span-5 md:col-span-2">
                <div class="pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full">
                            <label for="organization"
                                   class="block text-sm/6 font-medium text-gray-900">Organization</label>
                            <select class="select select-bordered w-full mt-2 @error('organizer_id') input-error @enderror"
                                    name="organizer_id" disabled>
                                @foreach($organizers as $organizer)
                                    <option
                                        selected="{{ old('organizer_id') == $organizer->id ?? $event->organizer_id }}"
                                        value="{{ $organizer->id}}">
                                        {{ $organizer->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="mt-3 text-sm/6 text-gray-600">Events are permanently tied to their organization.</p>
                            @error('organizer_id')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <div class="space-y-12 col-span-5 md:col-span-3">
                <div class="pb-12">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="col-span-full lg:col-span-4">
                            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                            <input id="name" name="name" type="text"
                                   placeholder="Event Name" required
                                   value="{{ old('name', $event->name) }}"
                                   minlength="3"
                                   class="input input-bordered w-full mt-2 @error('name') input-error @enderror"/>
                            @error('name')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-full lg:col-span-2">
                            <label for="max_attendees" class="block text-sm/6 font-medium text-gray-900">Max Attendees</label>
                            <input id="max_attendees" name="max_attendees" type="number"
                                   required
                                   value="{{ old('max_attendees') ?? $event->max_attendees }}"
                                   minlength="3"
                                   class="input input-bordered w-full mt-2 @error('max_attendees') input-error @enderror"/>
                            @error('max_attendees')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm/6 font-medium text-gray-900">About</label>
                            <textarea id="description" name="description"
                                      class="textarea textarea-bordered h-24 mt-2 w-full  @error('description') input-error @enderror"
                                      placeholder="Bio">{{ old('description') ?? $event->description }}</textarea>
                            <p class="mt-3 text-sm/6 text-gray-600">Briefly describe the event.</p>
                            @error('description')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="location" class="block text-sm/6 font-medium text-gray-900">Location</label>
                            <input id="location" name="location" type="text"
                                   placeholder="SV218" required
                                   value="{{ old('location') ?? $event->location }}"
                                   minlength="3"
                                   class="input input-bordered w-full mt-2 @error('location') input-error @enderror"
                            />
                            @error('location')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-full sm:col-span-3 lg:col-span-2">
                            <label for="start_datetime" class="block text-sm/6 font-medium text-gray-900">
                                Start Datetime
                            </label>
                            <input id="start_datetime" name="start_datetime" type="datetime-local"
                                   required
                                   value="{{ old('start_datetime') ?? $event->start_datetime }}"
                                   minlength="3"
                                   class="input input-bordered w-full mt-2 @error('start_datetime') input-error @enderror"
                            />
                            @error('start_datetime')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-full sm:col-span-3 lg:col-span-2">
                            <label for="end_datetime" class="block text-sm/6 font-medium text-gray-900">
                                End Datetime
                            </label>
                            <input id="end_datetime" name="end_datetime" type="datetime-local"
                                   required
                                   value="{{ old('end_datetime') ?? $event->end_datetime }}"
                                   minlength="3"
                                   class="input input-bordered w-full mt-2 @error('end_datetime') input-error @enderror"
                            />
                            @error('end_datetime')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-full lg:col-span-2">
                            <label for="photo" class="block text-sm/6 font-medium text-gray-900">Photo</label>
                            <div class="mt-2 flex items-center gap-x-3">
                                <svg class="size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                          d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <button type="button" class="btn">Change</button>
                            </div>
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover
                                photo</label>
                            <div
                                class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                         aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                              d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <div class="mt-4 flex text-sm/6 text-gray-600">
                                        <label for="file-upload"
                                               class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <button class="btn btn-error" form="delete">
                Delete
            </button>
            <div class="flex gap-x-6">
                <a type="button" class="btn" href="/events/{{ $event->id }}">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    <form id="delete" method="POST" action="/events/{{$event->id}}" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
