<?php

use App\Models\User;

test("unauthenticated users are redirected to login", function () {
    $response = $this->get(route("dashboard"));
    $response->assertRedirect(route("login"));
});

test("authenticated users can visit the dashboard", function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route("dashboard"));
    $response->assertStatus(200)->assertViewIs("pages.dashboard");
});
