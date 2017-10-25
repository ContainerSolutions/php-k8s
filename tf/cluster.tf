provider "google" {
  credentials = "${file(var.credentials)}"
  project     = "${var.project}"
  region      = "${var.region}"
}
resource "google_compute_network" "cluster_network" {
  name                    = "${var.cluster_name}-net"
  auto_create_subnetworks = "true"
}
resource "google_compute_firewall" "default" {
  name    = "${var.cluster_name}-allow-ssh"
  network = "${google_compute_network.cluster_network.name}"
  allow {
    protocol = "tcp"
    ports    = ["22"]
  }
  source_ranges = ["0.0.0.0/0"]
}
resource "google_container_cluster" "k8s" {
  name               = "${var.cluster_name}"
  zone               = "${var.cluster_zone}"
  initial_node_count = "${var.num_nodes}"
  logging_service    = "none"
  monitoring_service = "none"
  network            = "${google_compute_network.cluster_network.name}"
  node_version       = "${var.k8s_version}"

  master_auth {
    username = "${var.admin_user}"
    password = "${var.admin_password}"
  }

  node_config {
    oauth_scopes = [
      "https://www.googleapis.com/auth/compute",
      "https://www.googleapis.com/auth/devstorage.read_only",
      "https://www.googleapis.com/auth/cloud-platform",
    ]
    machine_type    = "${var.machine_type}"
    image_type      = "${var.image_type}"
    disk_size_gb    = "${var.disk_size_gb}"
  }
}

