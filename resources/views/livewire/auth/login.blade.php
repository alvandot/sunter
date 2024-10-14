    <div class="flex justify-center items-center ">
        <div class="card w-full max-w-sm shadow-2xl bg-opacity-20 bg-blue-500 backdrop-filter backdrop-blur-lg border border-opacity-20 border-blue-500">
            <div class="card-body">
                <div class="mb-3"><x-app-brand /></div>

                <x-form wire:submit.prevent="login">

                    <div class="form-control">
                        <label class="label" for="email">
                            <span class="label-text text-black">Email</span>
                        </label>
                        <x-input wire:model="email" type="email" id="email" class="input input-bordered bg-white text-black placeholder-black::placeholder" error-field="email"/>
                    </div>

                    <div class="form-control mt-4">
                        <label class="label" for="password">
                            <span class="label-text text-black">Password</span>
                        </label>
                        <x-input wire:model="password" type="password" id="password" class="input input-bordered bg-white text-black placeholder-black::placeholder" error-field="email"/>
                    </div>

                    <div class="flex justify-between items-center mt-4">
                        <label class="label cursor-pointer">
                            <x-checkbox wire:model="remember" type="checkbox" class="checkbox checkbox-sm bg-white border-white"/>
                            <span class="label-text ml-2 text-black">Ingat saya</span>
                        </label>
                    </div>

                    <x-slot:actions>
                        <x-button label="Masuk" class="btn-primary" type="submit" spinner="login" />
                    </x-slot:actions>
                </x-form>
            </div>
        </div>
    </div>
