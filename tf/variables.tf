variable "credentials" {
  description = "json file to use for auth"
}
variable "project" {
  description = "name of the project"
}
variable "cluster_name" {
  description = "The name of the cluster"
}
variable "cluster_zone" {
  description = "The Google Cloud Zone where the cluster is created"
  default     = "europe-west1-d"
}
variable "region" {
  description = "The region where resources will be created"
  default     = "europe-west1"
}
variable "num_nodes" {
  description = "The number of nodes"
  default     = 3
}
variable "admin_user" {
  default = "admin"
}
variable "admin_password" {
  default = "tralala01"
}
variable "k8s_version" {
  default = "1.6.2"
}
variable "machine_type" {
  default = "n1-standard-4"
}
variable "image_type" {
  default = "COS"
}
variable "disk_size_gb" {
  description = "Size of the disk attached to each node, specified in GB."
  default = "100"
}

