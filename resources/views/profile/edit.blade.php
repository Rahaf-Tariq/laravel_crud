<x-app-layout>
    <div class="page-header">
        <div class="page-title">Profile Settings</div>
    </div>

    <div style="max-width: 600px;">
        <div style="background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 4px; padding: 30px; margin-bottom: 20px;">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div style="background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 4px; padding: 30px; margin-bottom: 20px;">
            @include('profile.partials.update-password-form')
        </div>

        <div style="background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 4px; padding: 30px;">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>
