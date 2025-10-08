<?php

use App\Models\User;

test("guests cannot logout", function () {
    $response = $this->post(route("logout"));

    $response->assertRedirect(route("login"));
});

test("authenticated users can logout", function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route("logout"));

    $response->assertRedirect(route("home"));
    $this->assertGuest();
});

test("logout redirects to home page", function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route("logout"));

    $response->assertRedirect(route("home"));
});

test("user is no longer authenticated after logout", function () {
    $user = User::factory()->create();

    $this->actingAs($user);
    $this->assertAuthenticatedAs($user);

    $this->post(route("logout"));

    $this->assertGuest();
});

test("logout can be called multiple times without error", function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post(route("logout"));
    $this->assertGuest();

    // Try logging out again (should just redirect)
    $response = $this->post(route("logout"));
    $response->assertRedirect(route("login"));
});
