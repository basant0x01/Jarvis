#!/bin/bash

# Define the log file path
LOG_FILE="bash/bash-results/engine-log.txt"

function subdomain_enumeration_sublist3r() {
    # Log subdomain enumeration start
    echo "Subdomain Enumeration using Sublist3r" >> "$LOG_FILE"
    echo "$(date)" >> "$LOG_FILE"
    # Define input and output files
    scope_file="bash/bash-results/scope.txt"
    output_file="bash/bash-results/subdomain_enumeration_sublist3r.txt"

    # Loop through each domain in the input file
    while IFS= read -r domain; do
        echo "Enumerating subdomains for $domain"
        sublist3r -d "$domain" -o "$output_file"
    done < "$scope_file"
}

function subdomain_enumeration_findomain() {
    # Log subdomain enumeration start
    echo "Subdomain Enumeration using Findomain" >> "$LOG_FILE"
    echo "$(date)" >> "$LOG_FILE"

    # Perform subdomain enumeration
    findomain -f bash/bash-results/scope.txt -u bash/bash-results/subdomain_enumeration_findomain.txt 2>&1 | tee -a "$LOG_FILE"
}

function merge_subdomains() {
    # Merge subdomains from both sublist3r and findomain
    cat "bash/bash-results/subdomain_enumeration_sublist3r.txt" "bash/bash-results/subdomain_enumeration_findomain.txt" | sort -u > "bash/bash-results/subdomains.txt"
}

function validate_duplicates() {
    # Remove duplicates from subdomains.txt
    sort -u -o "bash/bash-results/subdomains.txt" "bash/bash-results/subdomains.txt"
}

function remove_before_end(){

    rm -fr bash/bash-results/subdomain_enumeration_sublist3r.txt
    rm -fr bash/bash-results/subdomain_enumeration_findomain.txt
    rm -fr bash/bash-results/subdomain_enumeration_findomain.old.txt

}

# Main function to initiate the subdomain enumeration process
function main() {
    subdomain_enumeration_findomain
    subdomain_enumeration_sublist3r
    merge_subdomains
    validate_duplicates
    remove_before_end
    echo "Subdomain enumeration completed. Results saved to bash/bash-results/subdomains.txt"
}

# Call the main function
main
